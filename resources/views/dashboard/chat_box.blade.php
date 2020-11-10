@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Chat with a Tutor</h3>
     </div>
     <div class="row">
       <div class="col-md-12">

         <div id="frame">
         	<div id="sidepanel">
         		<div id="profile">
         			<div class="wrap">
                        @if(is_null($user_image->profile_pic))
                        <img id="profile-img" src="{{ asset('public/dashboard/assets/images/dashboard_img.png') }}" class="online" alt="" />    
                        @else
         				<img id="profile-img" src="{{ asset('public/dashboard/assets/images/profile/' . $user_image->profile_pic) }}" class="online" alt="" />
         				<p>{{Auth::user()->first_name}}</p>
                        @endif
         			</div>
         		</div>
         		<div id="search">
         			
         			<b><input type="text" placeholder="Chat Users List" disabled="" /></b>
         		</div>

                
         		<div id="contacts">
         		@foreach($all_chat_users as $user)
                	<ul>
         				<li class="contact message_to_id" data-action="{{route('chat_messages')}}" data-id="{{$user->chat_id}}">
         					<div class="wrap" >
         						<!-- <span class="contact-status online"></span> -->
         						<img src="{{ asset('public/dashboard/assets/images/profile/' . $user->profile_pic) }}" alt="" />
         						<div class="meta">
         							<p class="name">{{$user->first_name}}</p>
         						</div>
         					</div>
         				</li>
<!-- 
         				<li class="contact active">
         					<div class="wrap">
         						<span class="contact-status"></span>
         						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         						<div class="meta">
         							<p class="name">Harvey Specter</p>
         						</div>
         					</div>
         				</li>
         				<li class="contact">
         					<div class="wrap">
         						<span class="contact-status"></span>
         						<img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
         						<div class="meta">
         							<p class="name">Rachel Zane</p>
         						</div>
         					</div>
         				</li>
         				<li class="contact">
         					<div class="wrap">
         						<span class="contact-status online"></span>
         						<img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
         						<div class="meta">
         							<p class="name">Donna Paulsen</p>
         						</div>
         					</div>
         				</li>
         				<li class="contact">
         					<div class="wrap">
         						<span class="contact-status"></span>
         						<img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
         						<div class="meta">
         							<p class="name">Jessica Pearson</p>
         						</div>
         					</div>
         				</li> -->
         			</ul>
                    @endforeach
         		</div>
                

         		<div id="bottom-bar">
         			
         		</div>

         		<!-- <div id="bottom-bar">
         			<button id="addcontact">
                <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>
                <span>Add contact</span>
              </button>
         			<button id="settings">
                <i class="fa fa-cog fa-fw" aria-hidden="true"></i>
                <span>Settings</span>
              </button>
         		</div> -->

         	</div>
         	<div class="content">
         	<!-- 	<div class="contact-profile">
         			<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         			<p>Harvey Specter</p>
         		</div>
         		<div class="messages">
         			<ul>
         				<li class="sent">
         					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
         					<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
         				</li>
         				<li class="replies">
         					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         					<p>When you're backed against the wall, break the god damn thing down.</p>
         				</li>
         				<li class="replies">
         					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         					<p>Excuses don't win championships.</p>
         				</li>
         				<li class="sent">
         					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
         					<p>Oh yeah, did Michael Jordan tell you that?</p>
         				</li>
         				<li class="replies">
         					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         					<p>No, I told him that.</p>
         				</li>
         				<li class="replies">
         					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         					<p>What are your choices when someone puts a gun to your head?</p>
         				</li>
         				<li class="sent">
         					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
         					<p>What are you talking about? You do what they say or they shoot you.</p>
         				</li>
         				<li class="replies">
         					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
         					<p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
         				</li>
         			</ul>
         		</div>
                <form action="{{route('message_from')}}" method="post">
                    {{csrf_field()}}
         		<div class="message-input">
         			<div class="wrap">
         			<input type="text" name="msg" placeholder="Write your message..." />
         			<button type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
         			</div>
         		</div>
                </form>-->
         	</div>
         </div>

       </div>
     </div>
	  </div>
  </div>
</div>
@endsection
