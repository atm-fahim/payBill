@extends('frontend.index')
@section('content')
    <div id="main-wrapper">
    <!-- =================================== FAQS =================================== -->
    <section class="log-space">
        <div class="container">

            <div class="row">

                <div class="col-lg-10 col-md-12 col-sm-12">



                    <div class="tab-content tabs_content_creative" id="myTabContent">

                        <!-- general Query -->
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                            <div class="accordion" id="generalac">
                                @if(count($faq_info)>0)
                                    @foreach($faq_info as $v_info)
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" onclick="$('#faq_{{$v_info->id}}').toggle();">
                                                        => {{$v_info->question}}
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="faq_{{$v_info->id}}" class="collapse show" style="display:none">
                                                <div class="card-body">
                                                        <?php echo $v_info->answer; ?>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>

                        <!-- general Query -->
                        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">

                            <div class="accordion" id="paymentac">
                                <div class="card">
                                    <div class="card-header" id="headingOne1">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#paymentcollapse" aria-expanded="true" aria-controls="paymentcollapse">
                                                May I Request For Refund?
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="paymentcollapse" class="collapse show" aria-labelledby="headingOne1" data-parent="#paymentac">
                                        <div class="card-body">
                                            <p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo1">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#paymentcollapseTwo" aria-expanded="false" aria-controls="paymentcollapseTwo">
                                                May I Get Any Offer in Future?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="paymentcollapseTwo" class="collapse" aria-labelledby="headingTwo1" data-parent="#paymentac">
                                        <div class="card-body">
                                            <p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree1">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#paymentcollapseThree" aria-expanded="false" aria-controls="paymentcollapseThree">
                                                How Much Time It will Take For refund?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="paymentcollapseThree" class="collapse" aria-labelledby="headingThree1" data-parent="#paymentac">
                                        <div class="card-body">
                                            <p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- general Query -->
                        <div class="tab-pane fade" id="upgrade" role="tabpanel" aria-labelledby="upgrade-tab">

                            <div class="accordion" id="upgradeac">
                                <div class="card">
                                    <div class="card-header" id="headingOne2">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#upgradecollapseOne" aria-expanded="true" aria-controls="upgradecollapseOne">
                                                How To Upgrade Learnup Theme?
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="upgradecollapseOne" class="collapse show" aria-labelledby="headingOne2" data-parent="#upgradeac">
                                        <div class="card-body">
                                            <p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo2">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#upgradecollapseTwo" aria-expanded="false" aria-controls="upgradecollapseTwo">
                                                Learnup available for WordPress Version?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="upgradecollapseTwo" class="collapse" aria-labelledby="headingTwo2" data-parent="#upgradeac">
                                        <div class="card-body">
                                            <p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree2">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#upgradecollapseThree" aria-expanded="false" aria-controls="upgradecollapseThree">
                                                Why We need to upgrade Learnup?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="upgradecollapseThree" class="collapse" aria-labelledby="headingThree2" data-parent="#upgradeac">
                                        <div class="card-body">
                                            <p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
    </div>
    <!-- ====================================== FAQS =================================== -->
@endsection
