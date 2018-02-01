<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CodeIgniter jQuery Ajax Live Search</title>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <style class="text/css">
        #autoSuggestionsList > li {
            background: none repeat scroll 0 0 #F3F3F3;
            border-bottom: 1px solid #E3E3E3;
            list-style: none outside none;
            padding: 3px 15px 3px 15px;
            text-align: left;
        }
    </style>
</head>
<body>

<div id="container">
    <div class="col-md-2" style="margin-top: 30px; "></div>
    <h1 class="heading" style="margin-top: 50px; color: #0b56a8">CodeIgniter jQuery Ajax Live Search</h1>
    <div id="body">

        <div class="col-md-2" style="margin-top: 30px; "></div>
        <div class="col-md-6" style="margin-top: 30px; ">

<!--            --><?php //echo form_open('Crud/addStudent'); ?>
            <div class="form-group">
                <!-- start (view code) -->
                <div class="something">
                    <div class="form-group">
                        <label for="regno">Name</label>
                        <input name="search_data" id="search_data" type="text" onkeyup="ajaxSearch();">

                    </div>

                    <div id="suggestions">
                        <div id="autoSuggestionsList">
                        </div>
                    </div>
                </div>
                <!-- end (view code) -->
            </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>

        </div>



    </div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- start (JS code) -->
<script type="text/javascript">
    function ajaxSearch()
    {
        var input_data = $('#search_data').val();

        if (input_data.length === 0)
        {
            $('#suggestions').hide();
        }
        else
        {

            var post_data = {
                'search_data': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Crud/autocomplete/",
                data: post_data,
                success: function (data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
            });

        }
    }
</script>
<!-- end (JS code) -->

</body>
</html>