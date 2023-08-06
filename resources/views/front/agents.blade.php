@extends('front.layouts.app')

@section('styles')
    <style>
        .wa-icon { width: 55px; position: absolute; display: block; top: -4px; left: 0;}
        .agent { background-color: #20AE39; display: block; text-align: center; border-radius: 50px; padding: 2px 10px; position: relative; margin-bottom: 20px;}
        .username { font-size: 20px; color: #ffffff; text-align: center; font-family: "PT Sans", sans-serif; font-weight: 700;}
        .vendors { background-color: #CEB247; padding: 20px; border-radius: 10px; }
        .agent-white { background-color: #fffefe; }
        .udark { color: #0B71C1; }
    </style>
@endsection

@section('content')
    <div class="pm-column-container pm-containerPadding80">
        <div class="container">
            <div class="row m-auto">
                <div class="pm-footer-social-info-container" style="margin-bottom: 10px;">
                    <h6 class="text-center">NHIRE AGENTS</h6>
                    <p class="text-center" style="font-size: 16px; font-weight:400;">Below are approved nhire agents. Transacting with anyone who is not on this list is at your own risk</p>
                </div>

                <div class="text-center" style="font-size: 18px; margin-bottom: 20px;">
                  <a href="https://account.nhiregroup.com/user/register" class="text-center text-primary">Back to register</a>
                </div>
    
                <div class="col-md-3"></div>
                <div class="col-md-6 vendors">
                    @foreach ($vendors as $item => $key)
                        @php
                            $mobile = substr($key->phone, -10);
                            $whatsapp = '234'.$mobile;
                        @endphp
                        @if($item % 2 == 1)
                            @if($key->username == 'Tsampson')
                                <a href="https://api.whatsapp.com/send/?phone=22964509735&text=Hello,+I+want+to+purchase+a+*JOBPASS*+for+*NHIRE*+JOBS+enrollment.+Hope+you+are+online?&app_absent=0" target="_blank" class="agent">
                                    <img src="{{ asset('assets/img/share/wa_icon.png') }}" alt="chat" class="wa-icon">
                                    <p class="username">{{ ucfirst($key->username) }}</p>
                                </a>
                            @else
                                <a href="https://api.whatsapp.com/send/?phone={{ $whatsapp }}&text=Hello,+I+want+to+purchase+a+*JOBPASS*+for+*NHIRE*+JOBS+enrollment.+Hope+you+are+online?&app_absent=0" target="_blank" class="agent">
                                    <img src="{{ asset('assets/img/share/wa_icon.png') }}" alt="chat" class="wa-icon">
                                    <p class="username">{{ ucfirst($key->username) }}</p>
                                </a>
                            @endif
                        @else
                            @if($key->username == 'Tsampson')
                                <a href="https://api.whatsapp.com/send/?phone=22964509735&text=Hello,+I+want+to+purchase+a+*JOBPASS*+for+*NHIRE*+JOBS+enrollment.+Hope+you+are+online?&app_absent=0" target="_blank" class="agent agent-white">
                                    <img src="{{ asset('assets/img/share/wa_icon.png') }}" alt="chat" class="wa-icon">
                                    <p class="username udark">{{ ucfirst($key->username) }}</p>
                                </a>
                            @else
                                <a href="https://api.whatsapp.com/send/?phone={{ $whatsapp }}&text=Hello,+I+want+to+purchase+a+*JOBPASS*+for+*NHIRE*+JOBS+enrollment.+Hope+you+are+online?&app_absent=0" target="_blank" class="agent-white agent">
                                    <img src="{{ asset('assets/img/share/wa_icon.png') }}" alt="chat" class="wa-icon">
                                    <p class="username udark">{{ ucfirst($key->username) }}</p>
                                </a>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="col-md-3"></div>
                {{--
                @foreach ($vendors as $item)
                    <div class="col-md-6">
                        <div>
                            <h4>{{ $item->name }}</h4>
                            <h6>{{ $item->email }}</h6>
                            <h6>{{ $item->phone }}</h6>
                        </div>
                    </div>
                @endforeach
                --}}
            </div>
        </div>
    </div>
@endsection
