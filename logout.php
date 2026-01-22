<?php
require_once __DIR__ . '/config/config.php';

try {
    require_once __DIR__ . '/config/activity_logger.php';
    require_once __DIR__ . '/includes/session_tracker.php';

    if (is_logged_in()) {
        $user = get_logged_user();
        
        try {
            $sessionTracker = new SessionTracker($pdo);
            $sessionTracker->endSession($user['id'], $_SESSION['tracking_session_id'] ?? null);
        } catch (Exception $e) {
            error_log("Session tracking error on logout: " . $e->getMessage());
        }
        
        try {
            log_activity('logout', 'user', $user['id'], "Logout: {$user['full_name']}", 'success');
        } catch (Exception $e) {
            error_log("Activity log error on logout: " . $e->getMessage());
        }
    }
} catch (Exception $e) {
    error_log("Logout error: " . $e->getMessage());
}

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
header('Location: /login.php');
exit;
?>
