<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Test Sidekickc</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/css/bootstrap-slider.min.css" rel="stylesheet" type="text/css">
    </head>
    <body class="bg-warning">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form id="frm-compare">
                    <div class="form-group">
                        <label for="compare-rate">Compare rate: <span>80</span>%</label><br />
                        <input id="compare-rate" data-slider-id="compare-rate" name="compare-rate" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="80" />
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="input-text-1">Text 1</label>
                            <textarea class="form-control" id="input-text-1" name="input-text-1" rows="10"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="input-text-2">Text 2</label>
                            <textarea class="form-control" id="input-text-2" name="input-text-2" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary px-4 float-right">Compare</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="input-text-result">Result</label>
                            <div class="form-control" id="input-text-result"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/bootstrap-slider.min.js"></script>

    <script src="{{ asset('js/index.js') }}"></script>
    </body>
</html>
