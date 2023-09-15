@extends('layouts.website')
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" style="width: 95%;" role="document">

        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <div class="container">
                <div class="row">

                    <div class="clear"></div>

                    <div class="container">
                        <div class="row">
                            <form role="form" id="payment-form">
                                <div class="col-sm-8 col-md-9 col-md-offset-2">

                                    <div class="container">
                                        <div class="row">
                                            <form action="#">
                                                <div id="oneWay">
                                                    <div class="col-md-8">
                                                        <div class="form-inline">
                                                            <span style="color:black"><strong>Outbound</strong> <span>Tue,
                                                                    18 Dec 2018</span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 bg-primary well">
                                                        <div class="text-center">


                                                            <div class="col-md-2 cbp-vm-image img">
                                                                <img src="{{asset('website/images/fly/1.png')}} " style="width: 40px;"
                                                                    alt="img01" />
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="col-md-3">
                                                                    <span style="color:black">16:50</span><br>
                                                                    <span style="color:black">BEG</span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span style="color:black">12h 39min</span>
                                                                    <ul class="airplane-itenerary">

                                                                        <li class="airplane-style"></li>
                                                                    </ul>
                                                                    <div>
                                                                        <span style="color:red;">1 stop</span>
                                                                        <span style="color:black">BRU</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span style="color:black">08:30</span><br>
                                                                    <span style="color:black">SKO</span>
                                                                </div>

                                                                <img class="outbound-flights-arrow" src="{{asset('website/assets/angle-arrow-down.png')}}">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-12 well hide" id="detailItenerary3">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 cbp-vm-image img">
                                                                                        <img src="{{asset('website/images/fly/1.png')}} "
                                                                                            style="width: 40px;" alt="img01" />
                                                                                    </div> <span style="color:black;">Delta
                                                                                        1745 | Operated by Turkish
                                                                                        Airlines</span>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <div class="col-md-10" style="display: flex;-ms-flex-align: center;align-items: center;">
                                                                                <div class="col-md-2 hour-duration">3h</div>

                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 vertical">
                                                                                        <div class="track"></div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="time">14:55</div><br><br>
                                                                                        <div class="time">15:33</div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="timeA">PRI ADEM
                                                                                            JASHARI</div><br>
                                                                                        <div class="timeA">TIR RINAS</div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="middle">
                                                                                <div class="longwait">14h 45min</div>
                                                                                <div class="connect">
                                                                                    <div class="connect-info">Connect
                                                                                        in Airport</div>
                                                                                    <div class="longway">Long wait</div>
                                                                                    <div class="split"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 cbp-vm-image img">
                                                                                        <img src="{{asset('website/images/fly/1.png')}} "
                                                                                            style="width: 40px;" alt="img01" />
                                                                                    </div> <span style="color:black;">Delta
                                                                                        1745 | Operated by Turkish
                                                                                        Airlines</span>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <div class="col-md-10" style="display: flex;-ms-flex-align: center;align-items: center;">
                                                                                <div class="col-md-2" style="display: inline-block;width: 4rem;font-size: 1.45rem;line-height: 1.125rem;font-weight: 400;letter-spacing: normal;color:black;">3h</div>

                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 vertical">
                                                                                        <div class="track"></div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="time">14:55</div><br><br>
                                                                                        <div class="time">15:33</div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="timeA">PRI ADEM
                                                                                            JASHARI</div><br>
                                                                                        <div class="timeA">TIR RINAS</div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="arrival-info"> <span><strong>Arrives:</strong>Thu,
                                                                                    13 Dec 2018</span> <span class="arrival-duration"><strong>Journey
                                                                                        Duration:</strong> 26h 20</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="return">
                                                    <div class="col-md-8">
                                                        <div class="form-inline">
                                                            <span style="color:black"><strong>Outbound</strong> <span>Tue,
                                                                    18 Dec 2018</span></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 bg-primary well">
                                                        <div class="text-center">
                                                            <div class="col-md-2 cbp-vm-image img">
                                                                <img src="{{asset('website/images/fly/1.png')}} " style="width: 40px;"
                                                                    alt="img01" />
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="col-md-3">
                                                                    <span style="color:black">16:50</span><br>
                                                                    <span style="color:black">BEG</span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span style="color:black">12h 39min</span>
                                                                    <ul class="airplane-itenerary">

                                                                        <li class="airplane-style"></li>
                                                                    </ul>
                                                                    <div>
                                                                        <span style="color:red;">1 stop</span>
                                                                        <span style="color:black">BRU</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span style="color:black">08:30</span><br>
                                                                    <span style="color:black">SKO</span>
                                                                </div>

                                                                <img class="itenerary1" src="{{asset('website/assets/angle-arrow-down.png')}}"></img>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-12 well hide" id="detailItenerary1">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 cbp-vm-image img">
                                                                                        <img src="{{asset('website/images/fly/1.png')}} "
                                                                                            style="width: 40px;" alt="img01" />
                                                                                    </div> <span style="color:black;">Delta
                                                                                        1745 | Operated by Turkish
                                                                                        Airlines</span>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <div class="col-md-10" style="display: flex;-ms-flex-align: center;align-items: center;">
                                                                                <div class="col-md-2 hour-duration">3h</div>

                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 vertical">
                                                                                        <div class="track"></div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="time">14:55</div><br><br>
                                                                                        <div class="time">15:33</div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="timeA">PRI ADEM
                                                                                            JASHARI</div><br>
                                                                                        <div class="timeA">TIR RINAS</div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="middle">
                                                                                <div class="longwait">14h 45min</div>
                                                                                <div class="connect">
                                                                                    <div class="connect-info">Connect
                                                                                        in Airport</div>
                                                                                    <div class="longway">Long wait</div>
                                                                                    <div class="split"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 cbp-vm-image img">
                                                                                        <img src="{{asset('website/images/fly/1.png')}} "
                                                                                            style="width: 40px;" alt="img01" />
                                                                                    </div> <span style="color:black;">Delta
                                                                                        1745 | Operated by Turkish
                                                                                        Airlines</span>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <div class="col-md-10" style="display: flex;-ms-flex-align: center;align-items: center;">
                                                                                <div class="col-md-2" style="display: inline-block;width: 4rem;font-size: 1.45rem;line-height: 1.125rem;font-weight: 400;letter-spacing: normal;color:black;">3h</div>

                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 vertical">
                                                                                        <div class="track"></div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="time">14:55</div><br><br>
                                                                                        <div class="time">15:33</div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="timeA">PRI ADEM
                                                                                            JASHARI</div><br>
                                                                                        <div class="timeA">TIR RINAS</div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="arrival-info"> <span><strong>Arrives:</strong>Thu,
                                                                                    13 Dec 2018</span> <span class="arrival-duration"><strong>Journey
                                                                                        Duration:</strong> 26h 20</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-inline">
                                                            <span style="color:black"><strong>Return</strong> <span>Tue,
                                                                    18 Dec 2018</span></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 bg-primary well">

                                                        <div class="text-center">

                                                            <div class="col-md-2 cbp-vm-image img">
                                                                <img src="{{asset('website/images/fly/1.png')}} " style="width: 40px;"
                                                                    alt="img01" />
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="col-md-3">
                                                                    <span style="color:black">16:50</span><br>
                                                                    <span style="color:black">BEG</span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span style="color:black">12h 39min</span>
                                                                    <ul class="airplane-itenerary">

                                                                        <li class="airplane-style"></li>
                                                                    </ul>
                                                                    <div>
                                                                        <span style="color:red;">1 stop</span>
                                                                        <span style="color:black">BRU</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span style="color:black">08:30</span><br>
                                                                    <span style="color:black">SKO</span>
                                                                </div>

                                                                <img class="itenerary2" src="{{asset('website/assets/angle-arrow-down.png')}}"></img>


                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-12 well hide" id="detailItenerary2">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 cbp-vm-image img">
                                                                                        <img src="{{asset('website/images/fly/1.png')}} "
                                                                                            style="width: 40px;" alt="img01" />
                                                                                    </div> <span style="color:black;">Delta
                                                                                        1745 | Operated by Turkish
                                                                                        Airlines</span>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <div class="col-md-10" style="display: flex;-ms-flex-align: center;align-items: center;">
                                                                                <div class="col-md-2" style="display: inline-block;width: 4rem;font-size: 1.45rem;line-height: 1.125rem;font-weight: 400;letter-spacing: normal;color:black;">3h</div>

                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 vertical">
                                                                                        <div class="track"></div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="time">14:55</div><br><br>
                                                                                        <div class="time">15:33</div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="timeA">PRI ADEM
                                                                                            JASHARI</div><br>
                                                                                        <div class="timeA">TIR RINAS</div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="middle">
                                                                                <div class="longwait">14h 45min</div>
                                                                                <div class="connect">
                                                                                    <div class="connect-info">Connect
                                                                                        in Airport</div>
                                                                                    <div class="longway">Long wait</div>
                                                                                    <div class="split"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 cbp-vm-image img">
                                                                                        <img src="{{asset('website/images/fly/1.png')}} "
                                                                                            style="width: 40px;" alt="img01" />
                                                                                    </div> <span style="color:black;">Delta
                                                                                        1745 | Operated by Turkish
                                                                                        Airlines</span>
                                                                                </div>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <div class="col-md-10" style="display: flex;-ms-flex-align: center;align-items: center;">
                                                                                <div class="col-md-2" style="display: inline-block;width: 4rem;font-size: 1.45rem;line-height: 1.125rem;font-weight: 400;letter-spacing: normal;color:black;">3h</div>

                                                                                <div class="col-md-10">
                                                                                    <div class="col-md-2 vertical">
                                                                                        <div class="track"></div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="time">14:55</div><br><br>
                                                                                        <div class="time">15:33</div>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="timeA">PRI ADEM
                                                                                            JASHARI</div><br>
                                                                                        <div class="timeA">TIR RINAS</div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="arrival-info"> <span><strong>Arrives:</strong>Thu,
                                                                                    13 Dec 2018</span> <span class="arrival-duration"><strong>Journey
                                                                                        Duration:</strong> 26h 20</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>


                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <!--Close col 12 -->
                        </div>
                    </div>
                    <!-- You can make it whatever width you want. I'm making it full width
on <= small devices and 4/12 page width on >= medium devices -->
                    <div class="col-md-12 text-center">

                        <div class="col-xs-12 col-md-10 col-md-offset-1">


                            <!-- CREDIT CARD FORM STARTS HERE -->
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table">
                                    <div class="row display-tr">
                                        <h3 class="panel-title display-td">Payment Details</h3>

                                    </div>
                                </div>
                                <div class="panel-body">


                                    <div class="row">

                                        <div class="col-xs-6">
                                            <label for="cardNumber">First Name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="name" class="form-control" placeholder="FirstName"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <label for="cardNumber">Last Name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="name" class="form-control" placeholder="LastName"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 mt-2">
                                            <label for="cardNumber">Gender</label>
                                            <div class="input-group" style="  margin: 0 auto;
    float: none;">
                                                <div class="clearBoth"></div>
                                                <input type="radio" name="editList" value="always" style="margin-left: 20px;cursor: pointer;">&nbsp;<span
                                                    style="color:black;margin-right: 20px;">Male</span>
                                                <input type="radio" name="editList" value="never" style="cursor: pointer;">&nbsp;<span
                                                    style="color:black;margin-right: 20px;">Female</span>
                                                <div class="clearBoth"></div>
                                            </div>


                                        </div>

                                        <div class="col-xs-3 mt-2">
                                            <label for="cardNumber">Date of Birth</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="DATE" class="form-control" placeholder="Date of Birth"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>


                                        <div class="col-xs-6 mt-2">
                                            <label for="cardNumber">Nacionality</label>

                                            <select class="form-control">
                                                <option value="AFG">Afghanistan</option>
                                                <option value="ALA">Åland Islands</option>
                                                <option value="ALB">Albania</option>
                                                <option value="DZA">Algeria</option>
                                                <option value="ASM">American Samoa</option>
                                                <option value="AND">Andorra</option>
                                                <option value="AGO">Angola</option>
                                                <option value="AIA">Anguilla</option>
                                                <option value="ATA">Antarctica</option>
                                                <option value="ATG">Antigua and Barbuda</option>
                                                <option value="ARG">Argentina</option>
                                                <option value="ARM">Armenia</option>
                                                <option value="ABW">Aruba</option>
                                                <option value="AUS">Australia</option>
                                                <option value="AUT">Austria</option>
                                                <option value="AZE">Azerbaijan</option>
                                                <option value="BHS">Bahamas</option>
                                                <option value="BHR">Bahrain</option>
                                                <option value="BGD">Bangladesh</option>
                                                <option value="BRB">Barbados</option>
                                                <option value="BLR">Belarus</option>
                                                <option value="BEL">Belgium</option>
                                                <option value="BLZ">Belize</option>
                                                <option value="BEN">Benin</option>
                                                <option value="BMU">Bermuda</option>
                                                <option value="BTN">Bhutan</option>
                                                <option value="BOL">Bolivia, Plurinational State of</option>
                                                <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BIH">Bosnia and Herzegovina</option>
                                                <option value="BWA">Botswana</option>
                                                <option value="BVT">Bouvet Island</option>
                                                <option value="BRA">Brazil</option>
                                                <option value="IOT">British Indian Ocean Territory</option>
                                                <option value="BRN">Brunei Darussalam</option>
                                                <option value="BGR">Bulgaria</option>
                                                <option value="BFA">Burkina Faso</option>
                                                <option value="BDI">Burundi</option>
                                                <option value="KHM">Cambodia</option>
                                                <option value="CMR">Cameroon</option>
                                                <option value="CAN">Canada</option>
                                                <option value="CPV">Cape Verde</option>
                                                <option value="CYM">Cayman Islands</option>
                                                <option value="CAF">Central African Republic</option>
                                                <option value="TCD">Chad</option>
                                                <option value="CHL">Chile</option>
                                                <option value="CHN">China</option>
                                                <option value="CXR">Christmas Island</option>
                                                <option value="CCK">Cocos (Keeling) Islands</option>
                                                <option value="COL">Colombia</option>
                                                <option value="COM">Comoros</option>
                                                <option value="COG">Congo</option>
                                                <option value="COD">Congo, the Democratic Republic of the</option>
                                                <option value="COK">Cook Islands</option>
                                                <option value="CRI">Costa Rica</option>
                                                <option value="CIV">Côte d'Ivoire</option>
                                                <option value="HRV">Croatia</option>
                                                <option value="CUB">Cuba</option>
                                                <option value="CUW">Curaçao</option>
                                                <option value="CYP">Cyprus</option>
                                                <option value="CZE">Czech Republic</option>
                                                <option value="DNK">Denmark</option>
                                                <option value="DJI">Djibouti</option>
                                                <option value="DMA">Dominica</option>
                                                <option value="DOM">Dominican Republic</option>
                                                <option value="ECU">Ecuador</option>
                                                <option value="EGY">Egypt</option>
                                                <option value="SLV">El Salvador</option>
                                                <option value="GNQ">Equatorial Guinea</option>
                                                <option value="ERI">Eritrea</option>
                                                <option value="EST">Estonia</option>
                                                <option value="ETH">Ethiopia</option>
                                                <option value="FLK">Falkland Islands (Malvinas)</option>
                                                <option value="FRO">Faroe Islands</option>
                                                <option value="FJI">Fiji</option>
                                                <option value="FIN">Finland</option>
                                                <option value="FRA">France</option>
                                                <option value="GUF">French Guiana</option>
                                                <option value="PYF">French Polynesia</option>
                                                <option value="ATF">French Southern Territories</option>
                                                <option value="GAB">Gabon</option>
                                                <option value="GMB">Gambia</option>
                                                <option value="GEO">Georgia</option>
                                                <option value="DEU">Germany</option>
                                                <option value="GHA">Ghana</option>
                                                <option value="GIB">Gibraltar</option>
                                                <option value="GRC">Greece</option>
                                                <option value="GRL">Greenland</option>
                                                <option value="GRD">Grenada</option>
                                                <option value="GLP">Guadeloupe</option>
                                                <option value="GUM">Guam</option>
                                                <option value="GTM">Guatemala</option>
                                                <option value="GGY">Guernsey</option>
                                                <option value="GIN">Guinea</option>
                                                <option value="GNB">Guinea-Bissau</option>
                                                <option value="GUY">Guyana</option>
                                                <option value="HTI">Haiti</option>
                                                <option value="HMD">Heard Island and McDonald Islands</option>
                                                <option value="VAT">Holy See (Vatican City State)</option>
                                                <option value="HND">Honduras</option>
                                                <option value="HKG">Hong Kong</option>
                                                <option value="HUN">Hungary</option>
                                                <option value="ISL">Iceland</option>
                                                <option value="IND">India</option>
                                                <option value="IDN">Indonesia</option>
                                                <option value="IRN">Iran, Islamic Republic of</option>
                                                <option value="IRQ">Iraq</option>
                                                <option value="IRL">Ireland</option>
                                                <option value="IMN">Isle of Man</option>
                                                <option value="ISR">Israel</option>
                                                <option value="ITA">Italy</option>
                                                <option value="JAM">Jamaica</option>
                                                <option value="JPN">Japan</option>
                                                <option value="JEY">Jersey</option>
                                                <option value="JOR">Jordan</option>
                                                <option value="KAZ">Kazakhstan</option>
                                                <option value="KEN">Kenya</option>
                                                <option value="KIR">Kiribati</option>
                                                <option value="PRK">Korea, Democratic People's Republic of</option>
                                                <option value="KOR">Korea, Republic of</option>
                                                <option value="KWT">Kuwait</option>
                                                <option value="KGZ">Kyrgyzstan</option>
                                                <option value="LAO">Lao People's Democratic Republic</option>
                                                <option value="LVA">Latvia</option>
                                                <option value="LBN">Lebanon</option>
                                                <option value="LSO">Lesotho</option>
                                                <option value="LBR">Liberia</option>
                                                <option value="LBY">Libya</option>
                                                <option value="LIE">Liechtenstein</option>
                                                <option value="LTU">Lithuania</option>
                                                <option value="LUX">Luxembourg</option>
                                                <option value="MAC">Macao</option>
                                                <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MDG">Madagascar</option>
                                                <option value="MWI">Malawi</option>
                                                <option value="MYS">Malaysia</option>
                                                <option value="MDV">Maldives</option>
                                                <option value="MLI">Mali</option>
                                                <option value="MLT">Malta</option>
                                                <option value="MHL">Marshall Islands</option>
                                                <option value="MTQ">Martinique</option>
                                                <option value="MRT">Mauritania</option>
                                                <option value="MUS">Mauritius</option>
                                                <option value="MYT">Mayotte</option>
                                                <option value="MEX">Mexico</option>
                                                <option value="FSM">Micronesia, Federated States of</option>
                                                <option value="MDA">Moldova, Republic of</option>
                                                <option value="MCO">Monaco</option>
                                                <option value="MNG">Mongolia</option>
                                                <option value="MNE">Montenegro</option>
                                                <option value="MSR">Montserrat</option>
                                                <option value="MAR">Morocco</option>
                                                <option value="MOZ">Mozambique</option>
                                                <option value="MMR">Myanmar</option>
                                                <option value="NAM">Namibia</option>
                                                <option value="NRU">Nauru</option>
                                                <option value="NPL">Nepal</option>
                                                <option value="NLD">Netherlands</option>
                                                <option value="NCL">New Caledonia</option>
                                                <option value="NZL">New Zealand</option>
                                                <option value="NIC">Nicaragua</option>
                                                <option value="NER">Niger</option>
                                                <option value="NGA">Nigeria</option>
                                                <option value="NIU">Niue</option>
                                                <option value="NFK">Norfolk Island</option>
                                                <option value="MNP">Northern Mariana Islands</option>
                                                <option value="NOR">Norway</option>
                                                <option value="OMN">Oman</option>
                                                <option value="PAK">Pakistan</option>
                                                <option value="PLW">Palau</option>
                                                <option value="PSE">Palestinian Territory, Occupied</option>
                                                <option value="PAN">Panama</option>
                                                <option value="PNG">Papua New Guinea</option>
                                                <option value="PRY">Paraguay</option>
                                                <option value="PER">Peru</option>
                                                <option value="PHL">Philippines</option>
                                                <option value="PCN">Pitcairn</option>
                                                <option value="POL">Poland</option>
                                                <option value="PRT">Portugal</option>
                                                <option value="PRI">Puerto Rico</option>
                                                <option value="QAT">Qatar</option>
                                                <option value="REU">Réunion</option>
                                                <option value="ROU">Romania</option>
                                                <option value="RUS">Russian Federation</option>
                                                <option value="RWA">Rwanda</option>
                                                <option value="BLM">Saint Barthélemy</option>
                                                <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KNA">Saint Kitts and Nevis</option>
                                                <option value="LCA">Saint Lucia</option>
                                                <option value="MAF">Saint Martin (French part)</option>
                                                <option value="SPM">Saint Pierre and Miquelon</option>
                                                <option value="VCT">Saint Vincent and the Grenadines</option>
                                                <option value="WSM">Samoa</option>
                                                <option value="SMR">San Marino</option>
                                                <option value="STP">Sao Tome and Principe</option>
                                                <option value="SAU">Saudi Arabia</option>
                                                <option value="SEN">Senegal</option>
                                                <option value="SRB">Serbia</option>
                                                <option value="SYC">Seychelles</option>
                                                <option value="SLE">Sierra Leone</option>
                                                <option value="SGP">Singapore</option>
                                                <option value="SXM">Sint Maarten (Dutch part)</option>
                                                <option value="SVK">Slovakia</option>
                                                <option value="SVN">Slovenia</option>
                                                <option value="SLB">Solomon Islands</option>
                                                <option value="SOM">Somalia</option>
                                                <option value="ZAF">South Africa</option>
                                                <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SSD">South Sudan</option>
                                                <option value="ESP">Spain</option>
                                                <option value="LKA">Sri Lanka</option>
                                                <option value="SDN">Sudan</option>
                                                <option value="SUR">Suriname</option>
                                                <option value="SJM">Svalbard and Jan Mayen</option>
                                                <option value="SWZ">Swaziland</option>
                                                <option value="SWE">Sweden</option>
                                                <option value="CHE">Switzerland</option>
                                                <option value="SYR">Syrian Arab Republic</option>
                                                <option value="TWN">Taiwan, Province of China</option>
                                                <option value="TJK">Tajikistan</option>
                                                <option value="TZA">Tanzania, United Republic of</option>
                                                <option value="THA">Thailand</option>
                                                <option value="TLS">Timor-Leste</option>
                                                <option value="TGO">Togo</option>
                                                <option value="TKL">Tokelau</option>
                                                <option value="TON">Tonga</option>
                                                <option value="TTO">Trinidad and Tobago</option>
                                                <option value="TUN">Tunisia</option>
                                                <option value="TUR">Turkey</option>
                                                <option value="TKM">Turkmenistan</option>
                                                <option value="TCA">Turks and Caicos Islands</option>
                                                <option value="TUV">Tuvalu</option>
                                                <option value="UGA">Uganda</option>
                                                <option value="UKR">Ukraine</option>
                                                <option value="ARE">United Arab Emirates</option>
                                                <option value="GBR">United Kingdom</option>
                                                <option value="USA">United States</option>
                                                <option value="UMI">United States Minor Outlying Islands</option>
                                                <option value="URY">Uruguay</option>
                                                <option value="UZB">Uzbekistan</option>
                                                <option value="VUT">Vanuatu</option>
                                                <option value="VEN">Venezuela, Bolivarian Republic of</option>
                                                <option value="VNM">Viet Nam</option>
                                                <option value="VGB">Virgin Islands, British</option>
                                                <option value="VIR">Virgin Islands, U.S.</option>
                                                <option value="WLF">Wallis and Futuna</option>
                                                <option value="ESH">Western Sahara</option>
                                                <option value="YEM">Yemen</option>
                                                <option value="ZMB">Zambia</option>
                                                <option value="ZWE">Zimbabwe</option>
                                            </select>
                                        </div>

                                        <div class="col-xs-6 mt-2">
                                            <label for="cardNumber">Passport or ID Number</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input type="Number" class="form-control" placeholder="Passport or ID Number">
                                            </div>
                                        </div>

                                        <div class="col-xs-6 mt-2">
                                            <label for="cardNumber">Passport or ID expiry date</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"></span>
                                                <input type="DATE" class="form-control" placeholder="Date of Birth"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-xs-12 mt-2">
                                        <div class="btn-group">
                                            <button class="btn btn-primary" type="button">Submit</button>
                                        </div>

                                    </div>


                                    </form>
                                </div>
                            </div>
                            <!-- CREDIT CARD FORM ENDS HERE -->


                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>






<section id="parallax" class="about-prx">
    <div class="effect-over">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main">
                        <div id="cbp-contentslider" class="cbp-contentslider">
                            <ul>
                                <li id="slide1">
                                    <h3 class="icon-wolf"><span>enezuela</span></h3>
                                    <div>
                                        <div class="cbp-content">
                                            <p>Veggies sunt bona vobis, proinde vos postulo esse magis desert raisin
                                                bush tomato soko salsify garbanzo horseradish cabbage burdock.</p>
                                            <p>Daikon artichoke gumbo azuki bean bok choy avocado winter purslane gram
                                                earthnut pea broccoli salsify squash plantain wattle seed wakame
                                                broccoli rabe bamboo shoot. Zucchini lotus root azuki bean epazote
                                                dulse pumpkin rutabaga spinach. Endive mung bean gumbo maize plantain
                                                rock melon.</p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide2">
                                    <h3 class="icon-rabbit"><span class="country-name1">ome</span></h3>
                                    <div>
                                        <div class="cbp-content">
                                            <p>Chicory collard greens tatsoi cress bamboo shoot broccoli rabe lotus
                                                root earthnut pea arugula okra welsh onion leek shallot courgette.
                                                Chard garlic fava bean pea sprouts gram spinach plantain tomatillo.
                                                Chicory garlic black-eyed pea gourd chickpea cucumber lotus root.</p>
                                            <p>Daikon artichoke gumbo azuki bean bok choy avocado winter purslane gram
                                                earthnut pea broccoli salsify squash plantain wattle seed wakame
                                                broccoli rabe bamboo shoot. Zucchini lotus root azuki bean epazote
                                                dulse pumpkin rutabaga spinach. Endive mung bean gumbo maize plantain
                                                rock melon.</p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide3">
                                    <h3 class="icon-aligator"><span class="country-name1">rgentine</span></h3>
                                    <div>
                                        <div class="cbp-content">
                                            <p>Tomato shallot broccoli rabe aubergine melon fava bean soybean sorrel.
                                                Tomatillo plantain wattle seed pea ricebean sorrel fennel welsh onion
                                                kakadu plum celery. Arugula radicchio garlic welsh onion kale celtuce
                                                tomato fava bean beet greens soybean burdock groundnut lentil broccoli
                                                rabe.</p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide4">
                                    <h3 class="icon-turtle"><span>urkey</span></h3>
                                    <div>
                                        <div class="cbp-content">
                                            <p>Yarrow bush tomato beetroot taro water chestnut komatsuna azuki bean.
                                                Parsnip artichoke water chestnut caulie carrot grape summer purslane
                                                brussels sprout fava bean tomatillo pea groundnut nori earthnut pea
                                                tigernut. Tigernut brussels sprout wakame tomatillo radicchio carrot
                                                maize swiss chard seakale melon grape broccoli pea sprouts kakadu plum
                                                plantain cauliflower. Gram salsify radicchio daikon courgette rock
                                                melon bunya nuts turnip greens. Cabbage black-eyed pea spinach
                                                asparagus plantain cress soybean spring onion salad artichoke pea
                                                garlic silver beet grape water spinach zucchini wakame summer purslane.</p>
                                        </div>
                                    </div>
                                </li>
                                <li id="slide5">
                                    <h3 class="icon-platypus"><span>rasil</span></h3>
                                    <div>
                                        <div class="cbp-content">
                                            <p>Potato watercress burdock spinach quandong jícama chard pea sprouts
                                                garlic celery turnip daikon kale lotus root sorrel coriander rock melon
                                                cabbage. Epazote salsify lentil rock melon eggplant cauliflower
                                                zucchini caulie catsear broccoli rabe pumpkin lettuce okra green bean
                                                squash seakale onion water chestnut. Sweet pepper peanut corn soko
                                                celery winter purslane.</p>
                                            <p>Daikon artichoke gumbo azuki bean bok choy avocado winter purslane gram
                                                earthnut pea broccoli salsify squash plantain wattle seed wakame
                                                broccoli rabe bamboo shoot. Zucchini lotus root azuki bean epazote
                                                dulse pumpkin rutabaga spinach. Endive mung bean gumbo maize plantain
                                                rock melon.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <nav>
                                <a href="#slide1" class="icon-wolf"><span>Venezuela</span></a>
                                <a href="#slide2" class="icon-rabbit"><span>Rome</span></a>
                                <a href="#slide3" class="icon-aligator"><span>Argentine</span></a>
                                <a href="#slide4" class="icon-turtle"><span>Turkey</span></a>
                                <a href="#slide5" class="icon-platypus"><span>Brasil</span></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--Close col-md-12-->
            </div>
        </div>
    </div>
</section>
@stop