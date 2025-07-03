                        <?php
                            $servername     = "localhost";
                            $dbname         = "myexpert_portfolio";
                            $username       = "myexpert_portfolio";
                            $password       = "u5Dyxe!ULZvC";
                        
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            
                            // Check connection
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }
                            echo "Connected successfully";
                            
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $subject = $_POST['subject'];
                            $message = $_POST['message'];
                            
                            $sql = "INSERT INTO `messages` (name, email, subject, message) VALUES ('$name', '$email', '$subject','$message')";
                                            
                            if ($conn->query($sql) === TRUE) {
                                session_start();
                                $_SESSION['success'] = 'Message sent successfully. I will get back to you as soon as possible';
                                header("Location: http://kafi.myexpertbd.com/");
                                exit();
                            } else {
                                session_start();
                                $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
                                header("Location: http://kafi.myexpertbd.com/");
                                exit();
                            }
                            
                            $conn->close();
                        ?>