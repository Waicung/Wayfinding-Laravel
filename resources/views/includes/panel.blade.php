<?php
    $name = Route::currentRouteName();
    switch ($name) {
        case 'newexperiment':
            $active = 1;
            break;

        case 'monitor':
            $active = 2;
            break;

        case 'recruitment':
            $active = 3;
            break;

        case 'analyzer':
            $active = 4;
            break;

        default:
            $active = 0;
            break;
    }
 ?>

<!--Dashboard control panel-->
<div class="container">
    <h3>Dashboard</h3>
    <ul class="nav nav-tabs">
        <li id="wf-panel-tab0"><a href="/home">Home{{ $active }}</a></li>
        <li id="wf-panel-tab1"><a href="/newexperiment">New Experiment</a></li>
        <li class="dropdown" id="wf-panel-tab2">
            <a class="dropdown-toggle" data-toggle="dropdown" href="/monitor">Monitor
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/monitor/stat">Statistics</a></li>
                <li><a href="/monitor/modifier">Modifier</a></li>
                <li><a href="/monitor/part">Participants</a></li>
            </ul>
        </li>
        <li class="dropdown" id="wf-panel-tab3">
            <a class="dropdown-toggle" data-toggle="dropdown" href="/recruitment">Recruitment
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/recruitment/forms">Forms</a></li>
                <li><a href="/recruitment/tests">Tests</a></li>
            </ul>
        </li>
        <li id="wf-panel-tab4"><a href="analyzer">Analyzer</a></li>
    </ul>

</div>

<!-- Highlight the currnet tab-->
<script>
    document.getElementById("wf-panel-tab"+{{ $active }}).className += " active";
</script>
