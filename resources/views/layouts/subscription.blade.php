<div id="subscription" class="container-fluid">
  <div class="row">
      <div class="offset-lg-3 col-12 col-lg-6 text-center px-5 px-lg-0">
          <h3 class="light-color">{{__('title.stay_in_the_know.title')}}</h3>
          <p class="light-color">{{__('title.stay_in_the_know.body')}}</p>
          <form action="#">
            <div class="d-lg-flex">
              <div class="input">
                <input type="text" id="subscribe-email" placeholder="Your email">
              </div>
              <div class="button">
                <button type="submit" id="btnSubscribe">Subscribe</button>
              </div>
            </div>
          </form>
      </div>
    </div>
</div>

<!-- Modal Sukses -->
<div class="modal fade modal-home" id="subscribeSuccess" tabindex="-1" aria-labelledby="subscribeSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="close-trigger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid-full">
                    <div class="row">
                        <div class="col-lg-12 modal-home__right">
                            <div class="wrapper">
                                <div class="subtitle subtitle--center font-size-40">
                                    Thank You
                                </div>
                                <h2 class="font-size-20 dark-color text-center my-4">
                                    Your request<br>
                                    has been received.
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Gagal -->
<div class="modal fade modal-home" id="subscribeFailed" tabindex="-1" aria-labelledby="subscribeSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="close-trigger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid-full">
                    <div class="row">
                        <div class="col-lg-12 modal-home__right">
                            <div class="wrapper text-center">
                                <div class="subtitle subtitle--center font-size-40">
                                    Invalid<br>
                                    Email Address
                                </div>
                                <h2 class="font-size-20 dark-color text-center my-4">
                                    Sorry, the email must be<br>
                                    a valid email address.
                                </h2>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary btn-rounded btn-gradient description mt-4" style="width:150px;">
                                      Try Again
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>