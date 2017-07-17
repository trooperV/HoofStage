<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Post;
	use App\User;
	use Mail;
	use Session;

	class PagesController extends Controller{
		public function getIndex(){
			$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
			$users = User::all();
			return view('pages.welcome')->with('posts', $posts)->with('users', $users);
		}

		public function getAbout(){
			$first = 'Victor';
			$second = 'Cholakov';

			$fullname = $first . " " . $second;
			return view('pages.about')->withFullname($fullname);
		}

		public function getContact(){
			return view('pages.contact');
		}

		public function postContact(Request $request){
			$this->validate($request, [
				'email' => 'required|email',
				'subject' => 'required|max:255',
				'message' => 'required'
				]);

			$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('hello@example.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
		}
	}