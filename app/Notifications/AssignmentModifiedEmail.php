<?php

namespace App\Notifications;

use App\Helpers\UserGreetings;
use App\Models\Assignment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmentModifiedEmail extends Notification
{
    use Queueable;

    protected $user;
    protected $assignment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Assignment $assignment)
    {
        $this->user = $user;
        $this->assignment = $assignment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = "=?UTF-8?B?".base64_encode("来自".env('APP_NAME')
                ."的通知 - 作业".$this->assignment->name.'的内容发生了变化')."?=";

        $message = (new MailMessage)
            ->subject($subject)
            ->greeting(UserGreetings::greet($this->user))
            ->line('因为作业'.$this->assignment->name.'的内容发生了变化，改作业已被重新标记为未完成。')
            ->line('作业'.$this->assignment->name.'经过修改后的内容为：')
            ->line('---')
            ->line($this->assignment->content)
            ->line('---')
            ->action('进入主页', url(route('home')))
            ->salutation('祝您学习快乐');

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}