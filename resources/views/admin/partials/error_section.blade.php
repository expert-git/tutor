                    @if(isset($result) && $result)
                        <div class="alert alert-success">
                          <strong>Success!</strong> {{$msg}}.
                        </div>                
                    @endif

                    @if(isset($result) && !$result)
                        <div class="alert alert-danger">
                          <strong>Error!</strong> {{$msg}}.
                        </div>
                    @endif

                    @if(Session::has('result') && Session::get('result')==true)
                        <div class="alert alert-success">
                          <strong>Success!</strong> {{Session::get('msg')}}.
                        </div>
                          {{Session::forget('result')}}
                          {{Session::forget('msg')}}                                    
                    @endif

                    @if(Session::has('result') && Session::get('result')==false)
                        <div class="alert alert-danger">
                          <strong>Error!</strong> {{Session::get('msg')}}.
                          {{Session::forget('result')}}
                          {{Session::forget('msg')}}
                        </div>                        
                    @endif                    