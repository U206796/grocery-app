<footer>
            <p> Logged in as: <?php echo $_SESSION["username"]; ?></p>
            <ul class="nav">
            <li><a onClick="return confirm('Do you really want to leave?');" href="logout.php">Log Out</a></li>
            <li><a href="reset.php">Password Reset</a></li>
            </ul>
</footer>

</body>

</html