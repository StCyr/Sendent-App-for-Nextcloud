<div class="section">

    <h2>
        <?php p($l->t('Dependencies Checker')); ?>
    </h2>

    <div style="display: flex; flex-direction: row">
        <div style="min-width: 270px">
            <h1>
                <?php p($l->t('Required applications')); ?>
            </h1>
            <div id="requiredApps">
            </div>
        </div>

        <div style="margin-left: 100px">
            <h1>
                <?php p($l->t('Recommended applications')); ?>
            </h1>
            <div id="recommendedApps">
            </div>
        </div>
    </div>
    <br>
    <p>
        <?php p($l->t('Click ')); ?>
        <a href='../apps' style="color: blue; text-decoration: underline">here</a>
        <?php p($l->t(' to open the app store to install missing dependencies.')); ?>
    </p>
</div>
