{"filter":false,"title":"functions.php","tooltip":"/labs/lab3/inc/functions.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":51,"column":15},"end":{"row":51,"column":16},"action":"insert","lines":["$"],"id":2821}],[{"start":{"row":51,"column":16},"end":{"row":51,"column":17},"action":"insert","lines":["p"],"id":2822}],[{"start":{"row":51,"column":17},"end":{"row":51,"column":18},"action":"insert","lines":["l"],"id":2823}],[{"start":{"row":51,"column":18},"end":{"row":51,"column":19},"action":"insert","lines":["a"],"id":2824}],[{"start":{"row":51,"column":19},"end":{"row":51,"column":20},"action":"insert","lines":["t"],"id":2825}],[{"start":{"row":51,"column":20},"end":{"row":51,"column":21},"action":"insert","lines":["e"],"id":2826}],[{"start":{"row":51,"column":21},"end":{"row":51,"column":22},"action":"insert","lines":["r"],"id":2827}],[{"start":{"row":51,"column":21},"end":{"row":51,"column":22},"action":"remove","lines":["r"],"id":2828}],[{"start":{"row":51,"column":20},"end":{"row":51,"column":21},"action":"remove","lines":["e"],"id":2829}],[{"start":{"row":51,"column":19},"end":{"row":51,"column":20},"action":"remove","lines":["t"],"id":2830}],[{"start":{"row":51,"column":19},"end":{"row":51,"column":20},"action":"insert","lines":["y"],"id":2831}],[{"start":{"row":51,"column":20},"end":{"row":51,"column":21},"action":"insert","lines":["e"],"id":2832}],[{"start":{"row":51,"column":21},"end":{"row":51,"column":22},"action":"insert","lines":["r"],"id":2833}],[{"start":{"row":51,"column":22},"end":{"row":51,"column":23},"action":"insert","lines":["1"],"id":2834}],[{"start":{"row":51,"column":23},"end":{"row":51,"column":24},"action":"insert","lines":["A"],"id":2835}],[{"start":{"row":51,"column":24},"end":{"row":51,"column":25},"action":"insert","lines":["c"],"id":2836}],[{"start":{"row":51,"column":25},"end":{"row":51,"column":26},"action":"insert","lines":["e"],"id":2837}],[{"start":{"row":51,"column":26},"end":{"row":51,"column":27},"action":"insert","lines":["s"],"id":2838}],[{"start":{"row":51,"column":27},"end":{"row":51,"column":28},"action":"insert","lines":[","],"id":2839}],[{"start":{"row":51,"column":28},"end":{"row":51,"column":29},"action":"insert","lines":[" "],"id":2840}],[{"start":{"row":51,"column":29},"end":{"row":51,"column":30},"action":"insert","lines":["#"],"id":2841}],[{"start":{"row":51,"column":29},"end":{"row":51,"column":30},"action":"remove","lines":["#"],"id":2842}],[{"start":{"row":51,"column":29},"end":{"row":51,"column":30},"action":"insert","lines":["$"],"id":2843}],[{"start":{"row":51,"column":30},"end":{"row":51,"column":31},"action":"insert","lines":["p"],"id":2844}],[{"start":{"row":51,"column":31},"end":{"row":51,"column":32},"action":"insert","lines":["l"],"id":2845}],[{"start":{"row":51,"column":32},"end":{"row":51,"column":33},"action":"insert","lines":["a"],"id":2846}],[{"start":{"row":51,"column":33},"end":{"row":51,"column":34},"action":"insert","lines":["y"],"id":2847}],[{"start":{"row":51,"column":34},"end":{"row":51,"column":35},"action":"insert","lines":["e"],"id":2848}],[{"start":{"row":51,"column":35},"end":{"row":51,"column":36},"action":"insert","lines":["r"],"id":2849}],[{"start":{"row":51,"column":36},"end":{"row":51,"column":37},"action":"insert","lines":["2"],"id":2850}],[{"start":{"row":51,"column":37},"end":{"row":51,"column":38},"action":"insert","lines":["A"],"id":2851}],[{"start":{"row":51,"column":38},"end":{"row":51,"column":39},"action":"insert","lines":["c"],"id":2852}],[{"start":{"row":51,"column":39},"end":{"row":51,"column":40},"action":"insert","lines":["e"],"id":2853}],[{"start":{"row":51,"column":40},"end":{"row":51,"column":41},"action":"insert","lines":["s"],"id":2854}],[{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"remove","lines":["        global $player1Aces, $player2Aces",""],"id":2857}],[{"start":{"row":15,"column":12},"end":{"row":23,"column":13},"action":"remove","lines":["if ($lastCard <= 13) {","            $cardSuit = 'clubs';","            } else if ($lastCard >= 14 && $lastCard <= 26) {","            $cardSuit = 'diamonds';","            } else if ($lastCard >= 27 && $lastCard <= 39) {","            $cardSuit = 'hearts';","            } else if ($lastCard > 39) {","            $cardSuit = 'spades';","            }"],"id":2858},{"start":{"row":15,"column":12},"end":{"row":23,"column":9},"action":"insert","lines":["if($lastCard <= 13) {","            $cardSuit = \"clubs\";","        } else if($lastCard > 13 && $lastCard <= 26) {","            $cardSuit = \"diamonds\";","        } else if($lastCard > 26 && $lastCard <= 39) {","            $cardSuit = \"hearts\";","        } else if($lastCard > 39) {","            $cardSuit = \"spades\";","        }"]}],[{"start":{"row":24,"column":0},"end":{"row":33,"column":5},"action":"remove","lines":["","            if ($cardValue == 0) {","        $cardValue = 13;","    }","    if($cardValue == 1) {","        echo \"<img class='ace' src='img/$cardSuit/$cardValue.png' alt='Ace'>\";","        $handAces = $handAces + 1;","    } else {","        echo \"<img src='img/$cardSuit/$cardValue.png' alt='Card'>\";","    }"],"id":2859},{"start":{"row":24,"column":0},"end":{"row":33,"column":9},"action":"insert","lines":["if($cardValue == 0) {","            $cardValue = 13;","        }","        if ($cardValue == 1) { //identifies an ace","            echo \"<img class='ace' src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />\";","            $handAces = $handAces + 1;   //another way to do this is using the syntax: $handAces++;","        }","        else {","            echo \"<img src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />\";","        }"]}],[{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"insert","lines":["    "],"id":2860}],[{"start":{"row":24,"column":4},"end":{"row":24,"column":8},"action":"insert","lines":["    "],"id":2861}],[{"start":{"row":34,"column":4},"end":{"row":34,"column":8},"action":"insert","lines":["    "],"id":2862}],[{"start":{"row":34,"column":8},"end":{"row":34,"column":12},"action":"insert","lines":["    "],"id":2863}],[{"start":{"row":17,"column":0},"end":{"row":17,"column":4},"action":"insert","lines":["    "],"id":2864},{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"insert","lines":["    "]},{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"insert","lines":["    "]},{"start":{"row":20,"column":0},"end":{"row":20,"column":4},"action":"insert","lines":["    "]},{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"insert","lines":["    "]},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"insert","lines":["    "]},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"insert","lines":["    "]},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"insert","lines":["    "]},{"start":{"row":25,"column":0},"end":{"row":25,"column":4},"action":"insert","lines":["    "]},{"start":{"row":26,"column":0},"end":{"row":26,"column":4},"action":"insert","lines":["    "]},{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"insert","lines":["    "]},{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"insert","lines":["    "]},{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"insert","lines":["    "]},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"insert","lines":["    "]},{"start":{"row":31,"column":0},"end":{"row":31,"column":4},"action":"insert","lines":["    "]},{"start":{"row":32,"column":0},"end":{"row":32,"column":4},"action":"insert","lines":["    "]},{"start":{"row":33,"column":0},"end":{"row":33,"column":4},"action":"insert","lines":["    "]},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":32,"column":36},"end":{"row":32,"column":41},"action":"remove","lines":["cards"],"id":2865}],[{"start":{"row":32,"column":35},"end":{"row":32,"column":36},"action":"remove","lines":["/"],"id":2866}],[{"start":{"row":28,"column":48},"end":{"row":28,"column":53},"action":"remove","lines":["cards"],"id":2867}],[{"start":{"row":28,"column":47},"end":{"row":28,"column":48},"action":"remove","lines":["/"],"id":2868}],[{"start":{"row":40,"column":4},"end":{"row":46,"column":21},"action":"remove","lines":["echo \" Points: \" . $handPoints;","","    echo \"  Aces: \"  . $handAces;","","    $totalPoints = $totalPoints + $handPoints;","","    return $handAces;"],"id":2869}],[{"start":{"row":36,"column":4},"end":{"row":38,"column":4},"action":"insert","lines":["","        ","    "],"id":2870}],[{"start":{"row":37,"column":8},"end":{"row":43,"column":21},"action":"insert","lines":["echo \" Points: \" . $handPoints;","","    echo \"  Aces: \"  . $handAces;","","    $totalPoints = $totalPoints + $handPoints;","","    return $handAces;"],"id":2871}],[{"start":{"row":36,"column":0},"end":{"row":36,"column":4},"action":"remove","lines":["    "],"id":2872},{"start":{"row":48,"column":0},"end":{"row":48,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"remove","lines":["    "],"id":2873}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"insert","lines":["    "],"id":2874}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"remove","lines":["    "],"id":2875}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"insert","lines":["    "],"id":2876}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"remove","lines":["    "],"id":2877}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":4},"action":"remove","lines":["    "],"id":2878}],[{"start":{"row":36,"column":0},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":2879}],[{"start":{"row":36,"column":0},"end":{"row":36,"column":4},"action":"insert","lines":["    "],"id":2880}],[{"start":{"row":36,"column":4},"end":{"row":36,"column":8},"action":"insert","lines":["    "],"id":2881}],[{"start":{"row":38,"column":0},"end":{"row":38,"column":4},"action":"remove","lines":["    "],"id":2882}],[{"start":{"row":37,"column":0},"end":{"row":38,"column":0},"action":"remove","lines":["",""],"id":2883}],[{"start":{"row":36,"column":39},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":2884}],[{"start":{"row":36,"column":38},"end":{"row":36,"column":39},"action":"remove","lines":[";"],"id":2885}],[{"start":{"row":36,"column":38},"end":{"row":36,"column":39},"action":"insert","lines":[";"],"id":2886}],[{"start":{"row":36,"column":39},"end":{"row":37,"column":0},"action":"insert","lines":["",""],"id":2887},{"start":{"row":37,"column":0},"end":{"row":37,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":37,"column":37},"end":{"row":38,"column":0},"action":"remove","lines":["",""],"id":2888}],[{"start":{"row":38,"column":4},"end":{"row":38,"column":8},"action":"insert","lines":["    "],"id":2889}],[{"start":{"row":39,"column":0},"end":{"row":39,"column":1},"action":"insert","lines":["="],"id":2890}],[{"start":{"row":39,"column":0},"end":{"row":39,"column":1},"action":"remove","lines":["="],"id":2891}],[{"start":{"row":38,"column":50},"end":{"row":39,"column":0},"action":"remove","lines":["",""],"id":2892}],[{"start":{"row":39,"column":4},"end":{"row":39,"column":8},"action":"insert","lines":["    "],"id":2893}],[{"start":{"row":37,"column":8},"end":{"row":37,"column":37},"action":"remove","lines":["echo \"  Aces: \"  . $handAces;"],"id":2894}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":8},"action":"remove","lines":["        "],"id":2895}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":4},"action":"insert","lines":["    "],"id":2896}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"insert","lines":["    "],"id":2897}],[{"start":{"row":36,"column":15},"end":{"row":36,"column":16},"action":"insert","lines":["<"],"id":2898}],[{"start":{"row":36,"column":16},"end":{"row":36,"column":17},"action":"insert","lines":["h"],"id":2899}],[{"start":{"row":36,"column":17},"end":{"row":36,"column":18},"action":"insert","lines":["3"],"id":2900}],[{"start":{"row":36,"column":17},"end":{"row":36,"column":18},"action":"remove","lines":["3"],"id":2901}],[{"start":{"row":36,"column":17},"end":{"row":36,"column":18},"action":"insert","lines":["4"],"id":2902}],[{"start":{"row":36,"column":18},"end":{"row":36,"column":19},"action":"insert","lines":[">"],"id":2903}],[{"start":{"row":36,"column":19},"end":{"row":36,"column":20},"action":"insert","lines":[" "],"id":2904}],[{"start":{"row":36,"column":19},"end":{"row":36,"column":20},"action":"remove","lines":[" "],"id":2905}],[{"start":{"row":36,"column":42},"end":{"row":36,"column":43},"action":"insert","lines":[" "],"id":2906}],[{"start":{"row":36,"column":43},"end":{"row":36,"column":44},"action":"insert","lines":["."],"id":2907}],[{"start":{"row":36,"column":44},"end":{"row":36,"column":45},"action":"insert","lines":[" "],"id":2908}],[{"start":{"row":36,"column":45},"end":{"row":37,"column":0},"action":"insert","lines":["",""],"id":2909},{"start":{"row":37,"column":0},"end":{"row":37,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":37,"column":4},"end":{"row":37,"column":8},"action":"remove","lines":["    "],"id":2910}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":4},"action":"remove","lines":["    "],"id":2911}],[{"start":{"row":36,"column":45},"end":{"row":37,"column":0},"action":"remove","lines":["",""],"id":2912}],[{"start":{"row":36,"column":45},"end":{"row":36,"column":47},"action":"insert","lines":["\"\""],"id":2913}],[{"start":{"row":36,"column":46},"end":{"row":36,"column":47},"action":"insert","lines":["<"],"id":2914}],[{"start":{"row":36,"column":47},"end":{"row":36,"column":48},"action":"insert","lines":["h"],"id":2915}],[{"start":{"row":36,"column":47},"end":{"row":36,"column":48},"action":"remove","lines":["h"],"id":2916}],[{"start":{"row":36,"column":47},"end":{"row":36,"column":48},"action":"insert","lines":["/"],"id":2917}],[{"start":{"row":36,"column":48},"end":{"row":36,"column":49},"action":"insert","lines":["h"],"id":2918}],[{"start":{"row":36,"column":49},"end":{"row":36,"column":50},"action":"insert","lines":["3"],"id":2919}],[{"start":{"row":36,"column":49},"end":{"row":36,"column":50},"action":"remove","lines":["3"],"id":2920}],[{"start":{"row":36,"column":49},"end":{"row":36,"column":50},"action":"insert","lines":["4"],"id":2921}],[{"start":{"row":36,"column":50},"end":{"row":36,"column":51},"action":"insert","lines":[">"],"id":2922}],[{"start":{"row":37,"column":0},"end":{"row":37,"column":8},"action":"remove","lines":["        "],"id":2923}]]},"ace":{"folds":[],"scrolltop":300,"scrollleft":0,"selection":{"start":{"row":36,"column":53},"end":{"row":36,"column":53},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":30,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1506019274471,"hash":"e4d4d84afb4fa94219080b5cc1c88a0785140006"}