<footer>
            <p> Logged in as: <?php echo $_SESSION["username"]; ?></p>
            <nav>
            <ul>
                <li><a onClick="return confirm('Do you really want to leave?');" href="logout.php">Log Out</a></li>
                <li><a href="reset.php">Password Reset</a></li>
            </ul>
            </nav>
</footer>

</body>

</html>