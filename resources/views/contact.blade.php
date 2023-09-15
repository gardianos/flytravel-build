@extends('layouts.website')

@section('content')

<div class="clear"></div>
<section id="top-info-contact">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-12 effect-5 effects">
                 
                 <div class="contact-square info-square col-md-4">
                     <i class="fa fa-home"></i>
                     <h3>@lang('strings.address')</h3>
                     <p>Vojvode Stepe Stepanovica,</p>
                     <p>nr.5 / 17520 Bujanovac, Serbia</p>
                 </div>
                 <div class="contact-square info-square col-md-4">
                     <i class="fa fa-phone"></i>
                     <h3>@lang('strings.phone_number')</h3>
                     <p>LOCAL: 017 653255</p>
                     <p>MOBILE: +38163 7378609</p>
                 </div>
                 <div class="contact-square info-square col-md-4 last-contact">
                     <i class="fa fa-envelope-o"></i>
                     <h3>@lang('strings.email_address')</h3>
                     <p>INFO@FLYTRAVEL.COM</p>
                     <p>www.FLYTRAVEL.COM</p>
                 </div>
              </div>
          </div>
     </div>
</section>   
                 
<section id="contact-msg-info">
   <div class="container">
      <div class="row">
         <div class="contact-page col-md-12 effect-5 effects">
                    <div class="text-center">
                        <h2>Contact Fly Travel</h2>
                        
                     </div>

                <!-- FIFTH EXAMPLE -->
                <div class="box-information">
                    <div class="box-content contact">
                        
                        <form id="" class="form email-form" method="post" action="{{ route('contact') }}">
                        @csrf
                          <div class="col-md-6 fc-content">
                            <input type="text" name="subject" id="subject" class="input-contact"  placeholder="Subject"/>
                            <input type="text" name="name" id="name" class="input-contact"  placeholder="Name"/>
                            <input type="email" name="email" class="input-contact"  id="email" placeholder="E-mail"/>
                          </div>
                          <div class="col-md-6 fc-content2">
                            <textarea name="message" id="message" class="input-contact" placeholder="Message" cols="30" rows="7"></textarea>
                            <button type="submit" class="btn submit-contact"><i class="fa fa-envelope-o"></i>SUBMIT</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div><!--Close col 12 -->

          </div>
        </div>
</section>      



@stop