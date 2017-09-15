<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SetPassword extends Notification implements ShouldQueue
{
    use Queueable;
	
	/**
	 * Information about the app name.
	 *
	 * @var string
	 */
	protected $appName;
	
	/**
	 * Information about the app url.
	 *
	 * @var string
	 */
	protected $appUrl;
	
	/**
	 * Information about the users first name.
	 *
	 * @var string
	 */
	protected $firstName;
	
	/**
	 * Information about the token.
	 *
	 * @var string
	 */
	protected $token;
	
	/**
	 * Information about the subject.
	 *
	 * @var string
	 */
	protected $subject;
	
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $token, string $firstName, string $subject = 'Set Password')
    {
		$this->appName = config('cms.site.name');
		
		$this->appUrl = config('cms.site.url');
		
		$this->token = $token;
		
		$this->firstName = $firstName;
		
		$this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) : array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
	    // Notice how this one is a bit different than the order placed notification. All that is different is we are setting the mailiable in the user model instead.
		$data = [
			'appName' => $this->appName,
			'firstName' => $this->firstName, 
			'setPasswordUrl' => url('/password/reset', $this->token)
		];
            
		return (new MailMessage)->view('emails.passwords.create', $data)->subject($this->subject);
	}

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) : array
    {
        return [];
    }
}
