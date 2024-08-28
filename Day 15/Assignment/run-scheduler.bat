<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('backup:database')->dailyAt('02:00');