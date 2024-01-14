				
				<div class="topadd-text-slider">
                    @if(isset($admanager_data) && !empty ($admanager_data))
                         @foreach ($admanager_data as $dataslider)            
                           @if($dataslider->position == 'slider')
                                <div>{{$dataslider->title}}</div>
                            @endif 
                        @endforeach
                     @endif 
                   
                </div>

                 <!-- @include('Web::home.admanger') -->