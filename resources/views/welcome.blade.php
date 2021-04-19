<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vuejs + Laravel | CRUD</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #c0c0c0;
            color: ffffff#;
            font-family: 'Montserrat', sans-serif;
            font-weight: 200;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            justify-content: center;
            margin-left: 20%;
            margin-right: 20%;
        }
        .position-ref {
            position: relative;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .navbar {
            margin-top: 20px;
        }
        .container-form {
            background-color: c0c0c0#;
            margin: 0px 0px 50px 0px;
            padding: 25px;
        }
        .container-inner-form {
            background-color: #FFF;
            margin: 50px;
            padding: 30px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        }
        .pCon{
                font-size: 1.25rem;
                color: gray;
            }
    </style>
</head>

<body>

<div  id="app" >
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        CAR
                        <p class="pCon">Basic CRUD App | Human Computer Interaction | Midterm Activity</p>
                    </div>
                    
                    
                    <div class="container-inner-form">
                        <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                            All fields are required!
                        </div>
                        <div class="form-group">
                            <label for="make">Make</label>
                            <input type="text" class="form-control" id="make" required placeholder="Make" name="make" v-model="newCar.make">
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" required placeholder="Model" name="model" v-model="newCar.model">
                        </div>

                        <button class="btn btn-lg btn-dark mb-4" @click.prevent="createCar()">
                            <i class="fas fa-plus-square"></i>
                        </button>

                        <table class="table table-striped table-hover" id="table">
                            <caption>List of Cars</caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="car in cars">
                                    <th scope="row">@{{car.id}}</th>
                                    <td>@{{car.make}}</td>
                                    <td>@{{car.model}}</td>

                                    <td @click="setVal(car.id, car.make, car.model)" class="btn btn-success mr-1" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>
                                    </td>
                                    <td @click.prevent="deleteCar(car)" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit car</h4>
                                    </div>
                                    <div class="modal-body">

                                        <input type="hidden" disabled class="form-control" id="e_id" name="id" required :value="this.e_id">
                                        Make: <input type="text" class="form-control" id="e_make" name="make" required :value="this.e_make">
                                        Model: <input type="text" class="form-control" id="e_model" name="model" required :value="this.e_model">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" @click="editCar()">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
</body>

</html>