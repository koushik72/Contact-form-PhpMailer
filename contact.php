<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-size: 15px;
            font-family: 'Roboto Slab', serif;
            font-weight: 300;
        }

        #contact-form-cont {
            margin-bottom: 25px;
        }

        /* helper classes */
        .text-center {
            text-align: center;
        }

        /* end of helper classes */
        .center {
            display: block;
            margin: 0 auto;
        }

        .form-cont {
            width: 90%;
        }

        .his, .her, .general {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            border: 1px solid #0000ff;
            padding: 15px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .her, .general {
            margin-top: 20px;
        }

        .submit-btn {
            margin-top: 15px;
            width: 100%;
            border: 2px solid #0000ff;
            font-size: 16px;
            font-weight: bold;
        }

        .submit-btn:hover {
            color: #ffffff;
        }

        .btn-hover {
            text-align: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
            background-color: transparent;
        }

        .btn-hover:hover {
            background-color: inherit;
            border: 2px solid #0000ff;
        }

        .btn-hover::after {
            content: '';
            position: absolute;
            z-index: -1;
            top: 0;
            background-color: #0000ff;
            bottom: 0;
            left: -100%;
            right: 100%;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }

        .btn-hover:hover::after {
            right: 0;
            left: 0;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }


    </style>
</head>
<body>

<main id="contact-form-cont">
    <section>
        <div class="container">
            <div class="row">
                <div class="form-cont center">
                    <h1 class="text-center">Registration Form</h1>
                    <form action="formhandler.php" method="post" id="contact-form">
                        <!-- his details -->
                        <div class="his">
                            <!-- his name -->
                            <div class="form-group">
                                <label for="hisName">His Name: </label>
                                <input type="text" class="form-control" name="hisName" placeholder="His Name" required>
                            </div>

                            <!-- phone -->
                            <div class="form-group">
                                <label for="hisPhone">Phone: </label>
                                <input type="number" class="form-control" name="hisPhone" placeholder="His Phone Number"
                                       required>
                            </div>

                            <!-- email -->
                            <div class="form-group">
                                <label for="hisEmail">Email: </label>
                                <input type="email" class="form-control" name="hisEmail" placeholder="His Email"
                                       required>
                            </div>

                            <!-- age -->
                            <div class="form-group">
                                <label for="hisAge">Age: </label>
                                <input type="text" class="form-control" name="hisAge" placeholder="His Age" required>
                            </div>

                            <!-- married total -->
                            <div class="form-group">
                                <label for="hisMarried">Married total times: </label>
                                <input type="number" class="form-control" name="hisMarried"
                                       placeholder="Married total times including current one" required>
                            </div>

                            <!-- children details -->
                            <div class="form-group">
                                <label for="hisChildren">Children with ages: </label>
                                <textarea name="hisChildren" id="hisChildren" cols="30" rows="3" class="form-control"
                                          placeholder="Please write his children names with their ages"
                                          required></textarea>
                            </div>

                            <!-- military -->
                            <div class="form-group">
                                <label for="hisMilitary">Are you current or former military ? : </label>
                                <input type="text" class="form-control" name="hisMilitary"
                                       placeholder="His military status" required>
                            </div>
                        </div>

                        <!-- her details -->
                        <div class="her">
                            <!-- his name -->
                            <div class="form-group">
                                <label for="herName">Her Name: </label>
                                <input type="text" class="form-control" name="herName" placeholder="Her Name" required>
                            </div>

                            <!-- phone -->
                            <div class="form-group">
                                <label for="herPhone">Phone: </label>
                                <input type="number" class="form-control" name="herPhone" placeholder="Her Phone Number"
                                       required>
                            </div>

                            <!-- email -->
                            <div class="form-group">
                                <label for="herEmail">Email: </label>
                                <input type="email" class="form-control" name="herEmail" placeholder="Her Email"
                                       required>
                            </div>

                            <!-- age -->
                            <div class="form-group">
                                <label for="herAge">Age: </label>
                                <input type="text" class="form-control" name="herAge" placeholder="Her Age" required>
                            </div>

                            <!-- married total -->
                            <div class="form-group">
                                <label for="married">Married total times: </label>
                                <input type="number" class="form-control" name="herMarried"
                                       placeholder="Married total times including current one" required>
                            </div>

                            <!-- children details -->
                            <div class="form-group">
                                <label for="herChildren">Children with ages: </label>
                                <textarea name="herChildren" id="herChildren" cols="30" rows="3" class="form-control"
                                          placeholder="Please write her children names with their ages"
                                          required></textarea>
                            </div>

                            <!-- military -->
                            <div class="form-group">
                                <label for="herMilitary">Are you current or former military ? : </label>
                                <input type="text" class="form-control" name="herMilitary"
                                       placeholder="Her military status" required>
                            </div>
                        </div>

                        <!-- general -->
                        <div class="general">
                            <!-- address -->
                            <div class="form-group">
                                <label for="address">Address: </label>
                                <textarea name="address" class="form-control" id="address" cols="30" rows="6"
                                          placeholder="Address" required></textarea>
                            </div>

                            <!-- years married -->
                            <div class="form-group">
                                <label for="yearsMarried">Years Married: </label>
                                <input type="number" class="form-control" name="yearsMarried"
                                       placeholder="Years Married" required>
                            </div>

                            <!-- topics -->
                            <!-- address -->
                            <div class="form-group">
                                <label for="topics">Topics you would like to see covered: </label>
                                <textarea name="topics" class="form-control" id="topics" cols="30" rows="6"
                                          placeholder="Topics you would like to see covered" required></textarea>
                            </div>
                        </div>
                        <!-- end of all fields -->
                        <button type="submit" class="btn btn-default submit-btn btn-hover">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>
</html>
