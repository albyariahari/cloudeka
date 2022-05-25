<?php
namespace App\Console\Commands;
date_default_timezone_set('asia/jakarta');

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
Use App\Http\Controllers\Admin\AdminMasterController;

// Model(s)
use App\Models\Documentation;
use App\Models\Setting;

class PublishDocumentation extends Command {
    protected $signature = 'documentation:publish';
    protected $description = 'Email notification that will be sent to author\'s email when an article get published or taken down.';
	private $__setting;

    public function __construct() {
        parent::__construct();
		
		// $this->__settings = new \stdClass();
		// $this->__settings->email_message_admin = Setting::where('name', 'email_message_admin')->first()->value;
		// $this->__settings->email_message_to = Setting::where('name', 'email_message_to')->first()->value;
		// $this->__settings->email_message_cc = Setting::where('name', 'email_message_cc')->first()->value;
    }

    public function handle() {
		/*-----------------*/
		/* PUBLISHING AREA */
		/*-----------------*/
		$publishings = Documentation::where([['publish_at', '<=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s')], ['status', "draft"]])->get();
		
		foreach ($publishings as $p) {
			$p->update(['status' => "publish", 'publish_at' => null]);
		}
		/*---------------------*/
		/* END PUBLISHING AREA */
		/*---------------------*/
		
        $this->info('YAY.');
    }
}