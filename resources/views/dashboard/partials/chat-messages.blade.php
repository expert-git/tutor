
               
               <div class="contact-profile">
                  <img src="{{asset('public/dashboard/assets/images/profile/'.$profile->profile_pic)}}" alt="" />
                  <p>{{$profile->first_name}}</p>
               </div>
               <div class="messages">
                  <ul>
                     @foreach($chat_messages as $message)
                        @if($message->from_id == Auth::user()->id)
                           <li class="replies">
                              <!-- <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /> -->
                              <p>{{$message->chat_message}}</p>
                           </li>
                        @else
                           <li class="sent">
                             <!--  <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /> -->
                              <p>{{$message->chat_message}}</p>
                           </li>
                        @endif
                     @endforeach
<!--                      <li class="replies">
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
                     </li> -->
                  </ul>
               </div>
                <form action="{{route('message_from')}}" id="chatSubmit" method="post">
                    {{csrf_field()}}
                     <div class="message-input">
                        <div class="wrap">
                        <input type="hidden" name="chat_id" id="chat_id" value="{{$chatid}}">   
                        <input type="text" name="msg" id="chat_msg" placeholder="Write your message..." required="" autocomplete="off"/>
                        <button type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                     </div>
                </form>
