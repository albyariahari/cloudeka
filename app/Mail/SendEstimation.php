<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// Model(s)
use App\Models\Setting;

class SendEstimation extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $carts;
    public $excludedComponent;
    public $excludedSubtotal;
    public $otherRequest;
    public $banner;
    public $body;
    public $disclaimer;
    public $socMed;
    public $promos;
    public $productInCart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $carts, $excludedComponent, $excludedSubtotal, $otherRequest, $promos, $productInCart)
    {
        $this->name = $name;
        $this->carts = $carts;
        $this->excludedComponent = $excludedComponent;
        $this->excludedSubtotal = $excludedSubtotal;
        $this->otherRequest = $otherRequest;
        $this->banner = Setting::where('name', 'setting__notif_banner')->first()->value;
        $this->body = explode('[user-data]', Setting::where('name', 'setting__notif_body_quotation')->first()->value);
        $this->disclaimer = Setting::where('name', 'setting__notif_disclaimer')->first()->value;

        $this->socMed['fb'] = Setting::where('name', 'company_socmed_facebook')->first()->value;
        $this->socMed['ig'] = Setting::where('name', 'company_socmed_instagram')->first()->value;
        $this->socMed['li'] = Setting::where('name', 'setting__social_media_linkedin_link')->first()->value;
        $this->socMed['tw'] = Setting::where('name', 'company_socmed_twitter')->first()->value;
        $this->socMed['yt'] = Setting::where('name', 'setting__social_media_youtube_link')->first()->value;

        $this->promos = $promos;
        $this->productInCart = $productInCart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send-estimation');
    }
}
