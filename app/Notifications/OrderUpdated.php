<?php
/**
 * @link      https://www.delaneymethod.com/cms
 * @copyright Copyright (c) DelaneyMethod
 * @license   https://www.delaneymethod.com/cms/license
 */

namespace App\Notifications;

use App\User;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class OrderUpdated extends Notification implements ShouldQueue
{
	use Queueable;
	
	/**
	 * Information about the user.
	 *
	 * @var string
	 */
	protected $user;
	
	/**
	 * Information about the order.
	 *
	 * @var string
	 */
	protected $order;
	
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
	public function __construct(Order $order, User $user, string $subject = 'Order Updated')
	{
		$this->order = $order;
		
		$this->user = $user;
		
		$this->subject = $subject;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param	mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable) : array
	{
		return ['database', 'broadcast'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param	mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		// We dont want to send out a new email - I think the API wil do this.
	}
	
	/**
	 * Get the broadcastable representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return BroadcastMessage
	 */
	public function toBroadcast($notifiable)
	{
		$data = [
			'order' => $this->order->load('user', 'status', 'location', 'order_type', 'shipping_method')
		];
		
		// Note, if we dont stick this broadcast on a queue, it gets added to the default queue - unless you are listenings on default queue, this will never get processed.
		return (new BroadcastMessage($data))->onQueue('orders.broadcasts');
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param 	mixed 	$notifiable
	 * @return 	array
	 */
	public function toDatabase($notifiable) : array
	{
		return [
			'order' => $this->order
		];
	}
}
