<?php
    session_start();
    if(!isset($_SESSION['session_id'])){
        header('location:signin');
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Krishna Kanhaiya" name="author" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-3">
                    <form method="post" action="product-add">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" class="form-control" name="product_price" id="product_price">
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Add Product">
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Invoice</th>
                                </tr>
                            </thead>
                            <tbody id="product"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function(){
                $('form').submit(function(event){
                    event.preventDefault();
                    $.ajax({
                        url:'formrequest/'+$(this).attr('action'),
                        type:$(this).attr('method'),
                        data:$(this).serializeArray(),
                        success:function(data){
                            $('.notification').html(data);
                            getProduct();
                        }
                    });
                });
            });

            function getProduct(){
                $.get('formrequest/product-list', function(data){
                    $('#product').html(data);
                });
            }
            getProduct();
        </script>
    </body>
</html>