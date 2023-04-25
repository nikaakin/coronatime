<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuthMail extends Mailable
{
	use Queueable, SerializesModels;

	public function __construct(
		public string $title,
		public string $hint,
		public string $href,
		public string $content,
	) {
	}

	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Auth Mail',
		);
	}

	public function content(): Content
	{
		return new Content(
			view: 'auth.feedback',
			with: [
				'title'  => $this->title,
				'hint'   => $this->hint,
				'href'   => $this->href,
				'content'=> $this->content,
			]
		);
	}

	public function attachments(): array
	{
		return [];
	}
}
