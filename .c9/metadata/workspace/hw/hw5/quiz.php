{"filter":false,"title":"quiz.php","tooltip":"/hw/hw5/quiz.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":15,"column":21},"end":{"row":15,"column":22},"action":"insert","lines":["r"],"id":379}],[{"start":{"row":15,"column":22},"end":{"row":15,"column":23},"action":"insert","lines":["n"],"id":380}],[{"start":{"row":15,"column":23},"end":{"row":15,"column":24},"action":"insert","lines":["a"],"id":381}],[{"start":{"row":15,"column":24},"end":{"row":15,"column":25},"action":"insert","lines":["m"],"id":382}],[{"start":{"row":15,"column":25},"end":{"row":15,"column":26},"action":"insert","lines":["e"],"id":383}],[{"start":{"row":15,"column":45},"end":{"row":15,"column":51},"action":"remove","lines":["userId"],"id":384},{"start":{"row":15,"column":45},"end":{"row":15,"column":53},"action":"insert","lines":["username"]}],[{"start":{"row":3,"column":22},"end":{"row":3,"column":28},"action":"remove","lines":["userId"],"id":385},{"start":{"row":3,"column":22},"end":{"row":3,"column":30},"action":"insert","lines":["username"]}],[{"start":{"row":48,"column":23},"end":{"row":48,"column":44},"action":"remove","lines":["$_SESSION[\"username\"]"],"id":386},{"start":{"row":48,"column":23},"end":{"row":48,"column":43},"action":"insert","lines":["$userInfo[\"userId\"];"]}],[{"start":{"row":25,"column":0},"end":{"row":25,"column":25},"action":"remove","lines":["echo $userInfo[\"userId\"];"],"id":387}],[{"start":{"row":24,"column":26},"end":{"row":25,"column":0},"action":"remove","lines":["",""],"id":388}],[{"start":{"row":11,"column":0},"end":{"row":22,"column":1},"action":"remove","lines":["function getUserInfo() {","    global $conn;","    $sql = \"SELECT *","            FROM users","            WHERE username = '\" . $_SESSION['username'] . \"'\";","","","    $stmt = $conn -> prepare($sql);","    $stmt -> execute();","    $record = $stmt -> fetch(PDO::FETCH_ASSOC);","    return $record;","}"],"id":389}],[{"start":{"row":13,"column":0},"end":{"row":13,"column":26},"action":"remove","lines":["$userInfo = getUserInfo();"],"id":390}],[{"start":{"row":100,"column":39},"end":{"row":100,"column":54},"action":"insert","lines":["\"Total Score: \""],"id":391}],[{"start":{"row":100,"column":53},"end":{"row":100,"column":54},"action":"remove","lines":["\""],"id":392}],[{"start":{"row":100,"column":39},"end":{"row":100,"column":40},"action":"remove","lines":["\""],"id":393}],[{"start":{"row":100,"column":56},"end":{"row":100,"column":57},"action":"insert","lines":["<"],"id":394}],[{"start":{"row":100,"column":57},"end":{"row":100,"column":58},"action":"insert","lines":["p"],"id":395}],[{"start":{"row":100,"column":58},"end":{"row":100,"column":59},"action":"insert","lines":[" "],"id":396}],[{"start":{"row":100,"column":59},"end":{"row":100,"column":60},"action":"insert","lines":["i"],"id":397}],[{"start":{"row":100,"column":60},"end":{"row":100,"column":61},"action":"insert","lines":["d"],"id":398}],[{"start":{"row":100,"column":61},"end":{"row":100,"column":62},"action":"insert","lines":["="],"id":399}],[{"start":{"row":100,"column":62},"end":{"row":100,"column":64},"action":"insert","lines":["\"\""],"id":400}],[{"start":{"row":100,"column":63},"end":{"row":100,"column":64},"action":"insert","lines":["p"],"id":401}],[{"start":{"row":100,"column":64},"end":{"row":100,"column":65},"action":"insert","lines":["o"],"id":402}],[{"start":{"row":100,"column":65},"end":{"row":100,"column":66},"action":"insert","lines":["i"],"id":403}],[{"start":{"row":100,"column":66},"end":{"row":100,"column":67},"action":"insert","lines":["n"],"id":404}],[{"start":{"row":100,"column":67},"end":{"row":100,"column":68},"action":"insert","lines":["t"],"id":405}],[{"start":{"row":100,"column":67},"end":{"row":100,"column":68},"action":"remove","lines":["t"],"id":406}],[{"start":{"row":100,"column":66},"end":{"row":100,"column":67},"action":"remove","lines":["n"],"id":407}],[{"start":{"row":100,"column":65},"end":{"row":100,"column":66},"action":"remove","lines":["i"],"id":408}],[{"start":{"row":100,"column":64},"end":{"row":100,"column":65},"action":"remove","lines":["o"],"id":409}],[{"start":{"row":100,"column":63},"end":{"row":100,"column":64},"action":"remove","lines":["p"],"id":410}],[{"start":{"row":100,"column":63},"end":{"row":100,"column":64},"action":"insert","lines":["s"],"id":411}],[{"start":{"row":100,"column":64},"end":{"row":100,"column":65},"action":"insert","lines":["c"],"id":412}],[{"start":{"row":100,"column":65},"end":{"row":100,"column":66},"action":"insert","lines":["o"],"id":413}],[{"start":{"row":100,"column":66},"end":{"row":100,"column":67},"action":"insert","lines":["r"],"id":414}],[{"start":{"row":100,"column":67},"end":{"row":100,"column":68},"action":"insert","lines":["e"],"id":415}],[{"start":{"row":100,"column":69},"end":{"row":100,"column":74},"action":"insert","lines":["></p>"],"id":416}],[{"start":{"row":12,"column":0},"end":{"row":13,"column":0},"action":"remove","lines":["",""],"id":417}],[{"start":{"row":11,"column":0},"end":{"row":12,"column":0},"action":"remove","lines":["",""],"id":418}],[{"start":{"row":10,"column":0},"end":{"row":11,"column":0},"action":"remove","lines":["",""],"id":419}],[{"start":{"row":7,"column":0},"end":{"row":10,"column":0},"action":"remove","lines":["","include '../../dbConnection.php';","$conn = getDatabaseConnection($dbname=\"users\");",""],"id":420}],[{"start":{"row":6,"column":1},"end":{"row":7,"column":0},"action":"remove","lines":["",""],"id":421}],[{"start":{"row":100,"column":0},"end":{"row":105,"column":13},"action":"remove","lines":["    <script>","        /* global $ */","","","","    </script>"],"id":422}],[{"start":{"row":94,"column":44},"end":{"row":95,"column":0},"action":"insert","lines":["",""],"id":423},{"start":{"row":95,"column":0},"end":{"row":95,"column":24},"action":"insert","lines":["                        "]}],[{"start":{"row":95,"column":24},"end":{"row":95,"column":25},"action":"insert","lines":["<"],"id":424}],[{"start":{"row":95,"column":25},"end":{"row":95,"column":26},"action":"insert","lines":["p"],"id":425}],[{"start":{"row":95,"column":26},"end":{"row":95,"column":27},"action":"insert","lines":[" "],"id":426}],[{"start":{"row":95,"column":27},"end":{"row":95,"column":28},"action":"insert","lines":["i"],"id":427}],[{"start":{"row":95,"column":28},"end":{"row":95,"column":29},"action":"insert","lines":["d"],"id":428}],[{"start":{"row":95,"column":29},"end":{"row":95,"column":30},"action":"insert","lines":["="],"id":429}],[{"start":{"row":95,"column":30},"end":{"row":95,"column":32},"action":"insert","lines":["\"\""],"id":430}],[{"start":{"row":95,"column":31},"end":{"row":95,"column":32},"action":"insert","lines":["t"],"id":431}],[{"start":{"row":95,"column":32},"end":{"row":95,"column":33},"action":"insert","lines":["e"],"id":432}],[{"start":{"row":95,"column":33},"end":{"row":95,"column":34},"action":"insert","lines":["s"],"id":433}],[{"start":{"row":95,"column":34},"end":{"row":95,"column":35},"action":"insert","lines":["t"],"id":434}],[{"start":{"row":95,"column":36},"end":{"row":95,"column":41},"action":"insert","lines":["></p>"],"id":435}],[{"start":{"row":95,"column":31},"end":{"row":95,"column":35},"action":"remove","lines":["test"],"id":436},{"start":{"row":95,"column":31},"end":{"row":95,"column":32},"action":"insert","lines":["a"]}],[{"start":{"row":95,"column":32},"end":{"row":95,"column":33},"action":"insert","lines":["b"],"id":437}],[{"start":{"row":95,"column":33},"end":{"row":95,"column":34},"action":"insert","lines":["v"],"id":438}],[{"start":{"row":95,"column":33},"end":{"row":95,"column":34},"action":"remove","lines":["v"],"id":439}],[{"start":{"row":95,"column":32},"end":{"row":95,"column":33},"action":"remove","lines":["b"],"id":440}],[{"start":{"row":95,"column":32},"end":{"row":95,"column":33},"action":"insert","lines":["v"],"id":441}],[{"start":{"row":95,"column":33},"end":{"row":95,"column":34},"action":"insert","lines":["g"],"id":442}],[{"start":{"row":94,"column":0},"end":{"row":95,"column":0},"action":"remove","lines":["                        <p id=\"message\"></p>",""],"id":443}],[{"start":{"row":93,"column":57},"end":{"row":93,"column":58},"action":"remove","lines":["p"],"id":444}],[{"start":{"row":93,"column":57},"end":{"row":93,"column":58},"action":"insert","lines":["s"],"id":445}],[{"start":{"row":93,"column":58},"end":{"row":93,"column":59},"action":"insert","lines":["p"],"id":446}],[{"start":{"row":93,"column":59},"end":{"row":93,"column":60},"action":"insert","lines":["a"],"id":447}],[{"start":{"row":93,"column":60},"end":{"row":93,"column":61},"action":"insert","lines":["n"],"id":448}],[{"start":{"row":93,"column":75},"end":{"row":93,"column":76},"action":"remove","lines":["p"],"id":449}],[{"start":{"row":93,"column":75},"end":{"row":93,"column":76},"action":"insert","lines":["s"],"id":450}],[{"start":{"row":93,"column":76},"end":{"row":93,"column":77},"action":"insert","lines":["p"],"id":451}],[{"start":{"row":93,"column":77},"end":{"row":93,"column":78},"action":"insert","lines":["a"],"id":452}],[{"start":{"row":93,"column":78},"end":{"row":93,"column":79},"action":"insert","lines":["n"],"id":453}],[{"start":{"row":29,"column":13},"end":{"row":29,"column":45},"action":"remove","lines":["       <?=$userInfo[\"userId\"];?>"],"id":454}],[{"start":{"row":29,"column":12},"end":{"row":29,"column":13},"action":"remove","lines":[" "],"id":455}],[{"start":{"row":29,"column":8},"end":{"row":29,"column":12},"action":"remove","lines":["    "],"id":456}],[{"start":{"row":29,"column":4},"end":{"row":29,"column":8},"action":"remove","lines":["    "],"id":457}],[{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"remove","lines":["    "],"id":458}],[{"start":{"row":28,"column":41},"end":{"row":29,"column":0},"action":"remove","lines":["",""],"id":459}],[{"start":{"row":92,"column":56},"end":{"row":92,"column":57},"action":"insert","lines":["<"],"id":460}],[{"start":{"row":92,"column":57},"end":{"row":92,"column":58},"action":"insert","lines":["b"],"id":461}],[{"start":{"row":92,"column":58},"end":{"row":92,"column":59},"action":"insert","lines":["r"],"id":462}],[{"start":{"row":92,"column":59},"end":{"row":92,"column":60},"action":"insert","lines":[">"],"id":463}],[{"start":{"row":92,"column":60},"end":{"row":93,"column":0},"action":"insert","lines":["",""],"id":464},{"start":{"row":93,"column":0},"end":{"row":93,"column":24},"action":"insert","lines":["                        "]}],[{"start":{"row":92,"column":56},"end":{"row":93,"column":0},"action":"insert","lines":["",""],"id":465},{"start":{"row":93,"column":0},"end":{"row":93,"column":24},"action":"insert","lines":["                        "]}],[{"start":{"row":94,"column":24},"end":{"row":94,"column":48},"action":"remove","lines":["<span id=\"score\"></span>"],"id":466}],[{"start":{"row":94,"column":20},"end":{"row":94,"column":24},"action":"remove","lines":["    "],"id":467}],[{"start":{"row":94,"column":16},"end":{"row":94,"column":20},"action":"remove","lines":["    "],"id":468}],[{"start":{"row":94,"column":12},"end":{"row":94,"column":16},"action":"remove","lines":["    "],"id":469}],[{"start":{"row":94,"column":8},"end":{"row":94,"column":12},"action":"remove","lines":["    "],"id":470}],[{"start":{"row":94,"column":4},"end":{"row":94,"column":8},"action":"remove","lines":["    "],"id":471}],[{"start":{"row":94,"column":0},"end":{"row":94,"column":4},"action":"remove","lines":["    "],"id":472}],[{"start":{"row":93,"column":28},"end":{"row":94,"column":0},"action":"remove","lines":["",""],"id":473}],[{"start":{"row":92,"column":52},"end":{"row":92,"column":76},"action":"insert","lines":["<span id=\"score\"></span>"],"id":474}],[{"start":{"row":92,"column":52},"end":{"row":92,"column":76},"action":"remove","lines":["<span id=\"score\"></span>"],"id":475}],[{"start":{"row":92,"column":51},"end":{"row":92,"column":52},"action":"remove","lines":[" "],"id":476}],[{"start":{"row":92,"column":51},"end":{"row":92,"column":52},"action":"insert","lines":[" "],"id":477}],[{"start":{"row":92,"column":56},"end":{"row":93,"column":0},"action":"insert","lines":["",""],"id":478},{"start":{"row":93,"column":0},"end":{"row":93,"column":24},"action":"insert","lines":["                        "]}],[{"start":{"row":93,"column":24},"end":{"row":93,"column":48},"action":"insert","lines":["<span id=\"score\"></span>"],"id":479}]]},"ace":{"folds":[],"scrolltop":1200,"scrollleft":0,"selection":{"start":{"row":93,"column":48},"end":{"row":93,"column":48},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":42,"state":"start","mode":"ace/mode/php"}},"timestamp":1512152973876,"hash":"7f4258090d1d333be46dadb54167fbbb91e6cab8"}