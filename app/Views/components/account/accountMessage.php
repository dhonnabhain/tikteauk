<div class="rounded-md <?php echo $_SESSION['account']['is_success'] ? 'bg-green-50' : 'bg-red-50' ?> p-4 mb-6">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 <?php echo $_SESSION['account']['is_success'] ? 'text-green-400' : 'text-red-400' ?>" viewBox="0 0 20 20" fill="currentColor">
                <?php if (!$_SESSION['account']['is_success']) : ?>
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                <?php endif; ?>

                <?php if ($_SESSION['account']['is_success']) : ?>
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                <?php endif; ?>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm leading-5 font-medium <?php echo $_SESSION['account']['is_success'] ? 'text-green-800' : 'text-red-800' ?>">
                <?php echo $_SESSION['account']['message'] ?>
            </h3>
        </div>
    </div>
</div>