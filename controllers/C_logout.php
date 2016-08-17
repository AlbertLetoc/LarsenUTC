<?php
	CAS::logout();
	session_destroy();
	header('Location: ./');
