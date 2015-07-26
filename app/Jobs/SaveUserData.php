<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Image;
use App\Http\Requests\UserProfileEditRequest;
use App\Model\User;
use Storage;
class SaveUserData extends Job implements SelfHandling
{
	
    /**
     * Create a new job instance.
     * @var UserProfileEditRequest $request
     * @var User $user
     * @return void
     */
	protected $request;
	protected $user;

	
	protected $size = [
		'normal'=>['width'=>300,'heigth'=>300],
		'mini'=>['width'=>100,'heigth'=>100],
	];
	
    public function __construct(User $user,UserProfileEditRequest $request)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		define('DS', DIRECTORY_SEPARATOR);
		$base_path = public_path('upload'.DS.'users'.DS.$this->user->id.DS.'avatar'.DS);
		$file_name = md5(str_random(20));
		$file_ex = $this->request->file('avatar')->getClientOriginalExtension();
		$avatar_name = $file_name.'.'.$file_ex;

		$input = $this->request->all();
		$input['avatar'] = $avatar_name;
		$this->user->update($input);
		$this->user->save();
		

		$disk = Storage::disk('users');
		if($disk->exists($this->user->id.DS.'avatar'));
		$disk->deleteDirectory($this->user->id.DS.'avatar');
	
	
		$this->request->file('avatar')->move($base_path, 'origin_'.$file_name.'.'.$file_ex);
		//save image in origin size
		$img = Image::make($base_path.'origin_'.$file_name.'.'.$file_ex);
		$img->save($base_path.'origin_'.$file_name.'.'.$file_ex, 60);
		
		foreach($this->size as $key=>$item_size){
			$img = Image::make($base_path.'origin_'.$file_name.'.'.$file_ex)->resize($item_size['width'], null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			$img->save($base_path.$key.'_'.$file_name.'.'.$file_ex, 60);
		}

    }
}
