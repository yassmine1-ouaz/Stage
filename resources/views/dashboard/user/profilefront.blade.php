@extends('front.masterfront')

@section('title','Front')

<main> 
 <!-- Main content START -->
 <div class="col-lg-6 vstack gap-4">
          <!-- Setting Tab content START -->
          <div class="tab-content py-0 mb-0">

            <!-- Account setting tab START -->
            <div class="tab-pane show active fade" id="nav-setting-tab-1">
              <!-- Account settings START -->
              <div class="card mb-4">
                
                <!-- Title START -->
                <div class="card-header border-0 pb-0">
                  <h1 class="h5 card-title">Account Settings</h1>
                  <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>
                </div>
                <!-- Card header START -->
                <!-- Card body START -->
                <div class="card-body">
                  <!-- Form settings START -->
                  <form class="row g-3">
                    <!-- First name -->
                    <div class="col-sm-6 col-lg-4">
                      <label class="form-label">First name</label>
                      <input type="text" class="form-control" placeholder="" value="Sam">
                    </div>
                    <!-- Last name -->
                    <div class="col-sm-6 col-lg-4">
                      <label class="form-label">Last name</label>
                      <input type="text" class="form-control" placeholder="" value="Lanson">
                    </div>
                    <!-- Additional name -->
                    <div class="col-sm-6 col-lg-4">
                      <label class="form-label">Additional name</label>
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <!-- User name -->
                    <div class="col-sm-6">
                      <label class="form-label">User name</label>
                      <input type="text" class="form-control" placeholder="" value="@samlanson">
                    </div>
                    <!-- Birthday -->
                    <div class="col-lg-6">
                      <label class="form-label">Birthday </label>
                      <input type="text" class="form-control flatpickr" value="12/12/1990">
                    </div>
                    <!-- Allow checkbox -->
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="allowChecked" checked>
                        <label class="form-check-label" for="allowChecked">
                          Allow anyone to add you to their team
                        </label>
                      </div>
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6">
                      <label class="form-label">Phone number</label>
                      <input type="text" class="form-control" placeholder="" value="(678) 324-1251">
                      <!-- Add new number -->
                      <a class="btn btn-sm btn-dashed rounded mt-2" href="#!"> <i class="bi bi-plus-circle-dotted me-1"></i>Add new phone number</a>
                    </div>
                    <!-- Phone number -->
                    <div class="col-sm-6">
                      <label class="form-label">Email</label>
                      <input type="text" class="form-control" placeholder="" value="sam@webestica.com">
                      <!-- Add new email -->
                      <a class="btn btn-sm btn-dashed rounded mt-2" href="#!"> <i class="bi bi-plus-circle-dotted me-1"></i>Add new email address</a>
                    </div>
                    <!-- Page information -->
                    <div class="col-12">
                      <label class="form-label">Overview</label>
                      <textarea class="form-control" rows="4" placeholder="Description (Required)">Interested has all Devonshire difficulty gay assistance joy. Handsome met debating sir dwelling age material. As style lived he worse dried. Offered related so visitors we private removed. Moderate do subjects to distance.</textarea>
                      <small>Character limit: 300</small>
                    </div>
                    <!-- Button  -->
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-sm btn-primary mb-0">Save changes</button>
                    </div>
                  </form>
                  <!-- Settings END -->
                </div>
              <!-- Card body END -->
              </div>
              <!-- Account settings END -->

              <!-- Change your password START -->
              <div class="card">
                <!-- Title START -->
                <div class="card-header border-0 pb-0">
                  <h5 class="card-title">Change your password</h5>
                  <p class="mb-0">See resolved goodness felicity shy civility domestic had but.</p>
                </div>
                <!-- Title START -->
                <div class="card-body">
                  <!-- Settings START -->
                  <form class="row g-3">
                    <!-- Current password -->
                    <div class="col-12">
                      <label class="form-label">Current password</label>
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <!-- New password -->
                    <div class="col-12">
                      <label class="form-label">New password</label>
                      <!-- Input group -->
                      <div class="input-group">
                        <input class="form-control fakepassword" type="password" id="psw-input" placeholder="Enter new password">
                        <span class="input-group-text p-0">
                          <i class="fakepasswordicon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                        </span>
                      </div>
                      <!-- Pswmeter -->
                      <div id="pswmeter" class="mt-2"></div>
                      <div id="pswmeter-message" class="rounded mt-1"></div>
                    </div>
                    <!-- Confirm password -->
                    <div class="col-12">
                      <label class="form-label">Confirm password</label>
                      <input type="text" class="form-control" placeholder="">
                    </div>
                    <!-- Button  -->
                    <div class="col-12 text-end">
                      <button type="submit" class="btn btn-primary mb-0">Update password</button>
                    </div>
                  </form>
                  <!-- Settings END -->
                </div>
              </div>
              <!-- Card END -->
            </div>
            <!-- Account setting tab END -->
