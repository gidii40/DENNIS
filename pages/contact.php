<?php
// Contact page
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $body = isset($_POST['body']) ? htmlspecialchars($_POST['body']) : '';
    
    if ($name && $email && $subject && $body) {
        $message = '<div class="success-message">Thank you for your message! We will get back to you soon.</div>';
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
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            
            <div class="form-group">
                <label for="body">Message</label>
                <textarea id="body" name="body" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn-submit">Send Message</button>
        </form>
    </section>
</div>
