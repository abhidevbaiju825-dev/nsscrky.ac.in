<form action="<?= base_url('AdminPortal/setAcademicYear') ?>" method="POST" class="flex items-center m-0">
    <label for="academic_year" class="text-sm text-gray-400 whitespace-nowrap mr-2">Batch Context:</label>
    <select name="academic_year" id="academic_year" class="rounded-md border-gray-300 border py-1 px-2 text-sm focus:border-nss-gold focus:ring-nss-gold shadow-sm" onchange="this.form.submit()" style="width:130px;">
        <?php 
            $currentYear = (int)date('Y');
            $yearsList = [];
            for ($i = $currentYear + 1; $i >= $currentYear - 5; $i--) {
                $yearsList[] = ($i - 1) . '-' . $i;
            }
            $activeYear = session('academic_year');
            foreach ($yearsList as $y):
        ?>
            <option value="<?= $y ?>" <?= ($activeYear === $y) ? 'selected' : '' ?>><?= $y ?></option>
        <?php endforeach; ?>
    </select>
</form>
