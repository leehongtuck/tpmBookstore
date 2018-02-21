<?php
$title = "Dashboard";
require_once "inc/session.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
        require_once "inc/managerHead.php";?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>   
    </head>
    <body>
        <?php
        require_once "inc/managerNav.php";?>
    <section id="pieCharts" class="flex">
        <div class="smallCharts">
            <h2>Highest book sales</h2>
            <canvas id="pieChart1"></canvas>
        </div>
        <div class="smallCharts">
            <h2>Sales by month</h2>
            <canvas id="pieChart2"></canvas>
        </div>
        <div class="smallCharts">
            <h2>Sales by genre</h2>
            <canvas id="pieChart3"></canvas>
        </div>
    </section>
    <section id="barCharts">
        <div class="bigCharts">
            <h2>Depleting Inventory</h2>
            <canvas id="barChart1"></canvas>
        </div>
        <div class="bigCharts">
            <h2>Trusted and Non-Trusted Users</h2>
            <canvas id="barChart2"></canvas>
        </div>
    </section>
        <script>
            let pieChart1 = document.getElementById('pieChart1').getContext('2d');
            let salesChart1 = new Chart(pieChart1, {
                type: 'pie',
                data: {
                    labels: [
                        <?php 
                        $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, b.bookTitle FROM 
                            bookpurchase AS bp INNER JOIN book AS b ON bp.bookId = b.bookId
                            GROUP BY bp.bookId ORDER BY qty DESC LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_array($result)):
                            echo "'".$row['bookTitle']."',";
                        endwhile;?>
                        ],
                    datasets: [{
                        label: 'Sales',
                        data: [
                            <?php
                            $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, b.bookTitle FROM 
                            bookpurchase AS bp INNER JOIN book AS b ON bp.bookId = b.bookId
                            GROUP BY bp.bookId ORDER BY qty DESC LIMIT 5";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_array($result)):
                                echo $row['qty'].",";
                            endwhile;?>
                        ],
                        borderWidth: 4,
                        borderColor: '#777'
                    }]
                },
                options: {},
            });
            let pieChart2 = document.getElementById('pieChart2').getContext('2d');
            let salesChart2 = new Chart(pieChart2, {
                type: 'pie',
                data: {
                    labels: [
                        <?php 
                        $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, EXTRACT(MONTH FROM p.paymentDateTime) AS month, EXTRACT(YEAR FROM p.paymentDateTime) AS year FROM 
                            payment AS p INNER JOIN bookpurchase AS bp ON p.paymentId = bp.paymentId
                            INNER JOIN book AS b ON bp.bookId = b.bookId
                            GROUP BY EXTRACT(YEAR_MONTH FROM p.paymentDateTime) ORDER BY EXTRACT(YEAR_MONTH FROM p.paymentDateTime) DESC LIMIT 5 ";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_array($result)):
                            echo "'".$row['month']." / ". $row['year']. "',";
                        endwhile;?>
                        ],
                    datasets: [{
                        label: 'Sales',
                        data: [
                            <?php
                            $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, EXTRACT(MONTH FROM p.paymentDateTime) AS month, EXTRACT(YEAR FROM p.paymentDateTime) AS year FROM 
                            payment AS p INNER JOIN bookpurchase AS bp ON p.paymentId = bp.paymentId
                            INNER JOIN book AS b ON bp.bookId = b.bookId
                            GROUP BY EXTRACT(YEAR_MONTH FROM p.paymentDateTime) ORDER BY EXTRACT(YEAR_MONTH FROM p.paymentDateTime) DESC LIMIT 5 ";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_array($result)):
                                echo $row['qty'].",";
                            endwhile;?>
                        ],
                        borderWidth: 4,
                        borderColor: '#777'
                    }]
                },
                options: {},
            });
            let pieChart3 = document.getElementById('pieChart3').getContext('2d');
            let salesChart3 = new Chart(pieChart3, {
                type: 'pie',
                data: {
                    labels: [
                        <?php 
                        $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, g.genre FROM 
                            bookpurchase AS bp INNER JOIN book AS b ON bp.bookId = b.bookId
                            INNER JOIN genre AS g ON b.genreId = g.genreId
                            GROUP BY g.genre ORDER BY qty DESC LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_array($result)):
                            echo "'".$row['genre']."',";
                        endwhile;?>
                        ],
                    datasets: [{
                        label: 'Sales',
                        data: [
                            <?php
                            $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, g.genre FROM 
                            bookpurchase AS bp INNER JOIN book AS b ON bp.bookId = b.bookId
                            INNER JOIN genre AS g ON b.genreId = g.genreId
                            GROUP BY g.genre ORDER BY qty DESC LIMIT 5";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_array($result)):
                                echo $row['qty'].",";
                            endwhile;?>
                        ],
                        borderWidth: 4,
                        borderColor: '#777'
                    }]
                },
                options: {},
            });
            let barChart1 = document.getElementById('barChart1').getContext('2d');
            let salesChart4 = new Chart(barChart1, {
                type: 'bar',
                data: {
                    labels: [
                        <?php 
                        $sql = "SELECT bookTitle, bookQuantity FROM book ORDER BY bookQuantity LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_array($result)):
                            echo "'".$row['bookTitle']."',";
                        endwhile;?>
                        ],
                    datasets: [{
                        label: 'Inventory',
                        data: [
                            <?php
                            $sql = "SELECT bookTitle, bookQuantity FROM book ORDER BY bookQuantity LIMIT 5";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_array($result)):
                                echo $row['bookQuantity'].",";
                            endwhile;?>
                        ],
                        borderWidth: 4,
                        borderColor: '#777'
                    }]
                },
                options: {},
            });
            let barChart2 = document.getElementById('barChart2').getContext('2d');
            let salesChart5 = new Chart(barChart2, {
                type: 'bar',
                data: {
                    labels: ['Untrustworthy', 'Trustworthy'],
                    datasets: [{
                        label: 'Number of Users',
                        data: [
                            <?php
                            $sql = "SELECT COUNT(memberId) AS num FROM member WHERE memberTrust = 0";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);
                            echo $row['num'].",";
                            $sql = "SELECT COUNT(memberId) AS num FROM member WHERE memberTrust = 1";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);
                            echo $row['num'].",";
                             ?>
                        ],
                        borderWidth: 4,
                        borderColor: '#777'
                    }]
                },
                options: {},
            });
            
        </script>
    </body>