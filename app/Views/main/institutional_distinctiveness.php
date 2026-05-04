<?= $this->extend('layouts/home') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div style="background:linear-gradient(135deg,#0d2448 0%,#071530 100%);padding:48px 0 40px;">
  <div class="max-w-screen-xl mx-auto px-4">
    <h1 style="font-family:'Cinzel',serif;font-size:28px;color:#fff;font-weight:600;letter-spacing:0.06em;">Institutional Distinctiveness</h1>
    <div style="width:60px;height:3px;background:#b8922a;margin-top:10px;border-radius:2px;"></div>
  </div>
</div>

<section class="max-w-screen-xl mx-auto px-4 py-14">
  <div class="grid md:grid-cols-4 gap-8">
    <!-- IQAC Sidebar -->
    <div>
      <div style="background:#f9fafb;border-radius:12px;padding:16px;border:1px solid #eee;">
        <?php $slinks = [['Home/iqac','IQAC Home','🏠'],['Home/aqar','AQAR','📄'],['Home/nirf1','NIRF','📊'],['Home/iqacresult','Results','🎓'],['Home/best','Best Practices','⭐'],['Home/naac_certificates','NAAC Certificate','🏅'],['Home/institutional_distinctiveness','Distinctiveness','🏆'],['Home/naac_journey','NAAC Journey','🗺️']];
        foreach($slinks as $sl): ?>
        <a href="<?= base_url($sl[0]) ?>" style="display:block;padding:10px 14px;margin-bottom:4px;border-radius:8px;font-size:13px;font-weight:500;text-decoration:none;color:#0d2448;<?= $sl[0]=='Home/institutional_distinctiveness' ? 'background:#0d2448;color:#fff;' : 'background:rgba(255,255,255,0.8);' ?>"><?= $sl[2] ?> <?= $sl[1] ?></a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Content -->
    <div class="md:col-span-3">
      <div style="background:#fff;border-radius:16px;padding:32px;box-shadow:0 4px 25px rgba(0,0,0,0.05);border:1px solid #f0f0f0;">
        <div style="font-family:'Cinzel',serif;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#b8922a;margin-bottom:8px;">Vision & Mission</div>
        <h2 style="font-family:'Cinzel',serif;font-size:22px;color:#0d2448;font-weight:600;margin-bottom:24px;">Our Distinctive Approach</h2>
        
        <div style="line-height:1.8;color:#444;font-size:15px;text-align:justify;" class="space-y-6">
          <p>The vision of the college is to uplift the socio-economic backwardness and to build a powerful community by providing job oriented education in new generation programmes like Electronics, Computer Hardware and Software, Business administration and Commerce and to equip the stakeholders to survive the challenges in the present competitive world.</p>
          
          <p>The institution offers equal opportunity to all classes of the society to gain better education. The college is situated in a rural area in the high range where the students have limited opportunities for higher education in modern subjects in aided sector. The College has more than 28 years of excellence in the academic field. The alumni of the institution comprises of dignitaries in various fields of central and state Govt services, Public and Private sector undertakings, Media and many of them hail from different sections of the community.</p>

          <p>The IQAC, NSS and NCC cells and departments take various initiatives to uplift the attitude of the students towards the society and mankind as a whole. The faculty and the students are encouraged to perform extension activities and undertake several charitable works for the betterment of the community. Activities aimed at community service, Swatch Bharath initiatives, Palliative care, Anti Drug Abuse campaigns etc are conducted at various occasions under the supervision of the above cells. The faculty encourages the students to make use of the knowledge they gained from classrooms for the benefit of the community in a rational and reasonable way.</p>

          <div style="background:#f9fafb;padding:24px;border-radius:12px;border-left:4px solid #b8922a;">
            <h4 style="font-weight:700;color:#0d2448;margin-bottom:12px;">Key Initiatives</h4>
            <ul style="list-style:none;padding:0;" class="space-y-4">
              <li style="display:flex;gap:12px;">
                <span style="color:#b8922a;font-weight:bold;">1.</span>
                <span><strong>Supply of COVID fighting materials:</strong> The Rajakumari area was severely affected. Students and faculty supplied sanitizers, facemasks, PPE kits, and gloves worth Rs. 10,000/- to the Family Health Centre.</span>
              </li>
              <li style="display:flex;gap:12px;">
                <span style="color:#b8922a;font-weight:bold;">2.</span>
                <span><strong>Snehasparsham:</strong> NSS volunteers supported 20 bedridden patients with sanitizing stationaries, dresses, and food kits. They also raised Rs. 12,000/- for cancer patients.</span>
              </li>
              <li style="display:flex;gap:12px;">
                <span style="color:#b8922a;font-weight:bold;">3.</span>
                <span><strong>Santhwanam:</strong> Students spent a day at a nearby old age home with 54 inmates, providing lunch and performing cultural activities.</span>
              </li>
            </ul>
          </div>

          <p>The college has a vegetable garden developed by the students which includes several edible leaves and vegetables. The “Nakshathravanam” has been developed by the NSS volunteers in the college campus. Different varieties of fruit plants are also cultivated following “organic farming” protocols. The students are encouraged in eco-friendly activities. Research departments are functioning in the college for enhancing the research potentials of our students and those from nearby area.</p>

          <p>The students of our institution have participated in sports, arts and various cultural activities and received recognition in University level. The college is very much particular to identify the talents of each student and nourish them right from the beginning. The college offers necessary facility for the Divyangjan students and provides special care for them. Ramp facility is available for their convenience. A well-equipped gymnasium is available in the college campus and students are encouraged to make use of the gender neutral facility for their physical fitness.</p>
        </div>

        <div style="margin-top:32px;padding-top:24px;border-top:1px solid #eee;">
          <a href="https://nsscrky.ac.in/assets/naac2024/criteria7/Institutional_Distinctiveness.pdf" target="_blank" style="display:inline-flex;align-items:center;gap:10px;padding:12px 24px;background:#0d2448;color:#fff;border-radius:10px;text-decoration:none;font-weight:600;font-size:14px;transition:all 0.2s;" onmouseover="this.style.background='#b8922a'" onmouseout="this.style.background='#0d2448'">
            <span style="font-size:18px;">📄</span>
            Some ISR Initiatives of the Institution
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
