

<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-en_US.js"></script>

  </head>

  <body>
    
    <a data-target="#modal-container" data-toggle="modal" href="javascript:void(0)" class="text-capitalize" style="font-size: 12px; vertical-align: middle;"> add </a>
    
    <div id="modal-container"  class="modal fade hidden-print" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Experience</h4>
                </div>

              <div id="addExperience" class="modal-body">
                    <div class="form-horizontal">
                     <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="text" class="form-control" placeholder="Company Name"/>
                            </div>
                        </div>
                         <div class="form-group">
                             <div class="col-xs-12 col-sm-12 col-md-12">
                               <input type="text" class="form-control" placeholder="Company Name"/>
                             </div>
                         </div>
                        <div class="row">
                            <div class="Divider">
                                <div class="container-fluid">
                                    <div class="Divider-text">Address</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                      <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="Divider">
                                <div class="container-fluid">
                                    <div class="Divider-text">Duration</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Company Name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Company Name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12 text-left">
                                        <div class="checkbox-inline">
                                            <label>
                                                <input type="checkbox">
                                                Present
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="Divider">
                                <div class="container-fluid">
                                    <div class="Divider-text">Profile Informations</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="Divider">
                                <div class="container-fluid">
                                    <div class="Divider-text">Compensation</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker">
                                          <option>example 1</option>
                                          <option>example 2</option>
                                          <option>example 3</option>
                                          <option>example 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="form-control user-form">
                                            <option value="1">daily</option>
                                            <option value="2">monthly</option>
                                            <option value="3">annual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Company Name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox-inline">
                                            <label>
                                                <input type="checkbox" name="hide_salary" />
                                                Confidential?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="Divider">
                                <div class="container-fluid">
                                    <div class="Divider-text">Description</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <textarea class="form-control" placeholder="Description" row='4' col='2'> </textarea>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="text-right">
                                    <span id="chars" class="badge">255</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
              </div>
            </div>
        </div>
    </div>
    
    
  </body>

</html>