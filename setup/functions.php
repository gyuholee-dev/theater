<?php // 셋업 함수

// 기초 함수 ------------------------------------------------

// 파일 존재 검사
function fileExists($file) {
  return file_exists($file);
}

// json 파일 오픈
function openJson($file) {
  $json = file_get_contents($file);
  $json = json_decode($json, true);
  return $json;
}

// json 파일 세이브
function saveJson($file, $json) {
  $json = json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  return file_put_contents($file, $json);
}

// 로그 입력
function pushLog($log, $class='info') {
  global $MSG;
  $MSG[$class] .= ($MSG[$class] != '')?' | ':'';
  $MSG[$class] .= $log;
  return true;
}

// 로그 출력
function printLog() {
  global $MSG;
  $html = '';
  foreach ($MSG as $type => $log) {
    $html .= $log?"<div class='log $type'>$log</div>":'';
  }
  return "<div id='message'>$html</div>";
}

// 코드 생성
// 현재 시간을 소스로 최대 32자 임의 문자열 생성
function makeCode($max=32, $upper=false) {
  $code = md5(time());
  if ($max <= 32) {
    $code = substr($code, 0, $max);
  }
  if ($upper) {
    $code = strtoupper($code);
  }
  return $code;
}

// DB 함수 ------------------------------------------------

// DB 로그인
// 주의: mysqli_report(MYSQLI_REPORT_ALL) 설정 필요
function loginDB($dbConfig, $log=false) {
  global $DB;
  global $MSG;
  foreach ($dbConfig as $key => $value) {
    $$key = $value;
  }
  try {
    $DB = mysqli_connect('localhost', $user, $pass);
    if ($log) {
      pushLog('로그인 성공', 'success');
    }
    return true;
  } catch (Exception $e) {
    if ($log) {
      pushLog('로그인 실패: '.$e->getMessage(), 'error');
    }
    return false;
  }
}

// DB 셀렉트
function selectDB($dbConfig, $log=false) {
  global $DB;
  global $MSG;
  foreach ($dbConfig as $key => $value) {
    $$key = $value;
  }
  try {
    $DB = mysqli_select_db($DB, $database);
    if ($log) {
      pushLog('DB 선택 성공', 'success');
    }
    return $DB;
  } catch (Exception $e) {
    if ($log) {
      pushLog('DB 선택 실패: '.$e->getMessage(), 'error');
    }
    return false;
  }
}


// DB 접속
function connectDB($dbConfig, $log=false) {
  global $DB;
  global $MSG;
  foreach ($dbConfig as $key => $value) {
    $$key = $value;
  }
  try {
    $DB = mysqli_connect($host, $user, $pass, $database);
    if ($log) {
      pushLog('DB 접속 성공', 'success');
    }
    return $DB;
  } catch (Exception $e) {
    if ($log) {
      pushLog('DB 접속 실패: '.$e->getMessage(), 'error');
    }
    return false;
  }
}

// DB 접속해제
function disconnectDB($log=false) {
  global $DB;
  global $MSG;
  try {
    mysqli_close($DB);
    if ($log) {
      pushLog('DB 접속해제 성공', 'success');
    }
    return null;
  } catch (Exception $e) {
    if ($log) {
      pushLog('DB 접속해제 실패: '.$e->getMessage(), 'error');
    }
    return false;
  }
}

// DB 검사
function checkDB($dbConfig, $log=false) {
  return connectDB($dbConfig, $log);
}

// DB 생성
function createDB($dbConfig, $log=true) {
  global $MSG;
  foreach ($dbConfig as $key => $value) {
    $$key = $value;
  }
  try {
    $DB = mysqli_connect($host, $user, $pass);
    $sql = "CREATE DATABASE $database";
    mysqli_query($DB, $sql);
    if ($log) {
      pushLog('DB 생성 성공', 'success');
    }
    return true;
  } catch (Exception $e) {
    if ($log) {
      pushLog('DB 생성 실패: '.$e->getMessage(), 'error');
    }
    return false;
  }
}

// DB 설정파일 생성
function makeDBConfig($dbConfig, $log=false) {
  global $MSG;
  $file = 'configs/'.$dbConfig['file'];
  $write = saveJson($file, $dbConfig);
  if ($write !== false) {
    if ($log) {
      pushLog('설정파일 저장됨', 'success');
    }
    return true;
  } else {
    if ($log) {
      pushLog('설정파일 저장 실패', 'error');
    }
    return false;
  }
}

// 테이블 생성
function createTable($table, $drop=false, $log=false) {
  global $DB;
  global $MSG;

  if ($drop) {
    $sql = "DROP TABLE IF EXISTS $table";
    mysqli_query($DB, $sql);
  }

  $sql = file_get_contents('data/'.$table.'.sql');
  try {
    mysqli_query($DB, $sql);
    if ($log) {
      pushLog("생성 성공: $table", 'success');
    }
    return true;
  } catch (Exception $e) {
    if ($log) {
      pushLog("생성 실패: $table", 'error');
    }
    return false;
  }
}

// 테이블 검사
function checkTable($table, $log=false) {
  global $DB;
  global $MSG;
  mysqli_report(MYSQLI_REPORT_STRICT);
  
  $sql = "SHOW TABLES LIKE '$table'";
  $rows = mysqli_num_rows(mysqli_query($DB, $sql));
  mysqli_report(MYSQLI_REPORT_ALL);

  if ($rows == 0) {
    if ($log) {
      pushLog("테이블 없음: $table", 'success');
    }
    return false;
  }
  if ($log) {
    pushLog("테이블 있음: $table", 'error');
  }
  return true;
}
