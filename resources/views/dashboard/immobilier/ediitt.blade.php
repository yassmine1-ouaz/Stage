<div class="col-lg-6">
    <!-- General Element -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">General Element</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlReadonly">Readonly</label>
                    <input class="form-control" type="text" placeholder="Readonly input here..."
                           id="exampleFormControlReadonly" readonly>
                </div>
                <div class="form-group">
                    <label for="validationServer01">Input with Success</label>
                    <input type="text" class="form-control is-valid" id="validationServer01"
                           placeholder="Input with Success" value="Mark" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="form-group">
                    <label for="validationServer03">Input with Error</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03"
                           placeholder="Input with Error" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="form-group">
                    <label>Checkbox</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Check this custom checkbox 1</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Check this custom checkbox 2</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheckDisabled1" disabled>
                        <label class="custom-control-label" for="customCheckDisabled1">Check this custom
                            checkbox</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Radio Button</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio3">Toggle this custom radio</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio4">Or toggle this other custom radio</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" name="radioDisabled" id="customRadioDisabled2" class="custom-control-input"
                               disabled>
                        <label class="custom-control-label" for="customRadioDisabled2">Toggle this custom radio</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Switches</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
