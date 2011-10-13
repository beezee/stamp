<?php

/** EXAMPLES **/

};

function demo2() {
    $base = '
    <head>
        <title>
            Here is the title:
            <!-- title -->
                Default title [will be replaced with $content]
            <!-- /title -->
        </title>
    </head>
    <body>
        <div id=content>
            <!-- content -->
                Default content [will be replaced with $content]
            <!-- /content -->
        </div>
        <div class=sidebar>
            <!-- sidebar -->
                Sidebar has no content [will be replaced with $sidebar]
            <!-- /sidebar -->
        </div>
        <!-- footer -->
            Should remain untouched...
        <!-- /footer -->
    </body>
    ';

    $content = '
    <!-- title -->
        My title
    <!-- /title -->
    <!-- content -->
        My body
    <!-- /content -->
    ';

    $sidebar = '
    <!-- sidebar -->
        Sidebar contents
    <!-- /sidebar -->
    ';

    $tpl = new Stamp($base);
    $tpl->extendWith($content)->extendWith($sidebar);
    print "<hr><pre>".htmlspecialchars($tpl)."</pre>";
};

function test1() {
    $content = '
    <!-- title -->
        My title
    <!-- /title -->
    <!-- title -->
        My second title
    <!-- /title -->
    ';

    $tpl = new Stamp($content);
    $tpl->replace('title', 'my two titles');
    return $tpl;

}

function run_tests() {
    assert(trim(test1()) == "my two titles\n    my two titles");
}

if($_GET['run_tests']) {
    run_tests();
    print "<br>Tests: DONE";
} else {
    demo1();
    demo2();
}
