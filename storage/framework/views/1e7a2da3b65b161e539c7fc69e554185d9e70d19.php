<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h4><?php echo e($data['subject']); ?></h4>
<p><?php echo e($data['message']); ?></p>
<hr>
<p><?php echo e($user->organisation->name); ?></p>
<p><?php echo e($user->organisation->email); ?></p>
<p><?php echo e($user->name); ?></p>
</body>
</html><?php /**PATH C:\wamp64\www\code\Neutron\resources\views/emails/default.blade.php ENDPATH**/ ?>