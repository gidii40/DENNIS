<?php
// Contact page
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $body = isset($_POST['body']) ? trim($_POST['body']) : '';
    
    // Validation
    if ($name && $email && $subject && $body) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                // Prepare and execute insert statement
                $sql = "INSERT INTO contact_messages (name, email, subject, message, status) 
                        VALUES (:name, :email, :subject, :message, 'new')";
                $stmt = $db->getConnection()->prepare($sql);
                
                $result = $stmt->execute([
                    ':name' => htmlspecialchars($name),
                    ':email' => htmlspecialchars($email),
                    ':subject' => htmlspecialchars($subject),
                    ':message' => htmlspecialchars($body)
                ]);
                
                if ($result) {
                    $message = '<div class="success-message">Thank you for your message! We will get back to you soon.</div>';
                } else {
                    $message = '<div class="error-message">An error occurred while sending your message. Please try again.</div>';
                }
            } catch (PDOException $e) {
                $message = '<div class="error-message">Database error: ' . $e->getMessage() . '</div>';
            }
        } else {
            $message = '<div class="error-message">Please enter a valid email address.</div>';
        }
    } else {
        $message = '<div class="error-message">Please fill in all fields.</div>';
    }
}
?>
<div class="container">
    <section class="contact-section">
        <h1>Contact Us</h1>
        
        <?php echo $message; ?>
        
        <form method="POST" class="contact-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required maxlength="100">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required maxlength="100">
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required maxlength="200">
            </div>
            
            <div class="form-group">
                <label for="body">Message</label>
                <textarea id="body" name="body" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn-submit">Send Message</button>
        </form>
    </section>
</div>
