<?= $this->extend('layouts/admin_tailwind') ?>

<?= $this->section('page_title') ?>
Manage Dynamic Carousel
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
.carousel-preview-container {
    position: relative;
    border-radius: 0 0 0.75rem 0.75rem;
    overflow: hidden;
    background: #071530; 
}
.preview-iframe {
    width: 100%;
    height: 500px;
    border: none;
    pointer-events: none;
}
.edit-overlay {
    position: absolute;
    inset: 0;
    background: rgba(7, 21, 48, 0.6);
    backdrop-filter: blur(2px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 10;
}
.carousel-preview-container:hover .edit-overlay {
    opacity: 1;
}
.edit-overlay-btn {
    pointer-events: auto;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div x-data="carouselManager()" class="pb-10">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h4 class="text-xl font-bold text-nss-navy">Homepage Carousels</h4>
            <p class="text-sm text-gray-500">Manage the dynamic hero sliders shown on the main landing page.</p>
        </div>
        <button @click="openModalForNew()" class="inline-flex items-center gap-2 px-4 py-2 bg-nss-gold hover:bg-nss-gold-bright text-white text-sm font-medium rounded-lg shadow-sm transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-nss-gold">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Add New Slide Template
        </button>
    </div>

    <?php if(!empty($carousel_slides)): ?>
        <div class="space-y-8">
            <?php foreach($carousel_slides as $index => $slide): ?>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mb-1">
                            Slide <?= $slide['slide_order'] ?>
                        </span>
                        <h5 class="font-bold text-gray-900"><?= esc($slide['slide_title']) ?> <span class="text-xs font-normal text-gray-500 uppercase tracking-wider ml-2">(<?= esc($slide['template_type']) ?>)</span></h5>
                    </div>
                    <div>
                        <a href="<?= base_url('AdminPortal/carousel/delete/'.$slide['id']) ?>" onclick="return confirm('Are you sure you want to delete this slide?');" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors border border-red-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                            Delete
                        </a>
                    </div>
                </div>
                <div class="carousel-preview-container">
                    <iframe src="<?= base_url('Home/slide_preview/'.$slide['id']) ?>" class="preview-iframe"></iframe>
                    <div class="edit-overlay">
                        <button type="button" @click="openModalForEdit(<?= htmlspecialchars(json_encode($slide), ENT_QUOTES, 'UTF-8') ?>)" class="edit-overlay-btn inline-flex items-center gap-2 px-6 py-3 bg-white text-nss-navy font-bold rounded-xl shadow-xl hover:bg-gray-50 hover:scale-105 transition-all">
                            <svg class="w-5 h-5 text-nss-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
                            Edit Full Template Contents
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="rounded-lg bg-blue-50 p-4 border border-blue-100 flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <p class="text-sm text-blue-700">No carousel slides found. Click the button above to add your first slide.</p>
        </div>
    <?php endif; ?>

    <!-- Alpine Modal -->
    <div x-show="showModal" x-cloak class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="showModal" 
                     x-transition:enter="ease-out duration-300" 
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                     x-transition:leave="ease-in duration-200" 
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                     @click.away="showModal = false"
                     class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl">
                    
                    <form action="<?= base_url('AdminPortal/carousel/save') ?>" method="post">
                        <?= csrf_field() ?>
                        <!-- Modal Header -->
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Edit Slide Contents</h3>
                            <button type="button" @click="showModal = false" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="px-6 py-6 overflow-y-auto max-h-[70vh]">
                            <input type="hidden" name="id" x-model="formData.id">
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Template Type</label>
                                    <select class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="template_type" x-model="formData.template_type">
                                        <option value="hero">Hero (Default - Left Text, Right Stats)</option>
                                        <option value="ranklist">Ranklist (Text + Dynamic Student Images)</option>
                                        <option value="admissions">Admissions (Text + Tags)</option>
                                    </select>
                                    <p class="mt-1 text-xs text-gray-500">Changes layout on frontend.</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Eyebrow Text (Small Top Text)</label>
                                    <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="slide_eyebrow" x-model="formData.slide_eyebrow">
                                </div>
                                
                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                                    <textarea class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="slide_title" x-model="formData.slide_title" rows="2" placeholder="Use <em> tags for italic emphasis, e.g. Your <em>Journey</em> Begins"></textarea>
                                </div>
                                
                                <div class="md:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description Text</label>
                                    <textarea class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="slide_description" x-model="formData.slide_description" rows="3"></textarea>
                                </div>

                                <!-- CTA Links -->
                                <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6 mt-2 border-t border-gray-100 pt-6">
                                    <div class="space-y-4 pr-0 md:pr-6 md:border-r border-gray-100">
                                        <h6 class="font-semibold text-gray-900">Primary Action Button</h6>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                                            <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="primary_cta_text" x-model="formData.primary_cta_text">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Link</label>
                                            <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="primary_cta_link" x-model="formData.primary_cta_link">
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <h6 class="font-semibold text-gray-900">Secondary Ghost Button</h6>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                                            <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="secondary_cta_text" x-model="formData.secondary_cta_text">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Link</label>
                                            <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="secondary_cta_link" x-model="formData.secondary_cta_link">
                                        </div>
                                    </div>
                                </div>

                                <!-- Dynamic Specific Fields -->
                                <div class="md:col-span-3 mt-4" x-show="formData.template_type === 'hero'">
                                    <div class="rounded-lg bg-gray-50 border border-gray-200 p-5">
                                        <h6 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                                            Hero Template Extras (Right Panel Stats)
                                        </h6>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Update JSON representation of stats (Advanced):</label>
                                        <textarea class="block w-full rounded-md border-gray-300 border p-2 font-mono text-sm focus:border-nss-gold focus:ring-nss-gold" name="stats" x-model="formData.stats_json" rows="4"></textarea>
                                        
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Bottom Affiliation Text Top Level</label>
                                            <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm mb-3" name="affiliation_top" x-model="formData.affiliation_top">
                                            
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Bottom Affiliation Bottom Info</label>
                                            <textarea class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="affiliation_bottom" x-model="formData.affiliation_bottom" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="md:col-span-3 mt-4" x-show="formData.template_type === 'ranklist'">
                                    <div class="rounded-lg bg-amber-50 border border-amber-200 p-5">
                                        <h6 class="font-semibold text-amber-800 mb-3 flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                                            Ranklist Image Engine
                                        </h6>
                                        <div class="relative flex items-start mt-4">
                                            <div class="flex h-6 items-center">
                                                <input type="checkbox" id="dynamic_students" name="dynamic_students" value="1" x-model="formData.dynamic_students" class="h-4 w-4 rounded border-gray-300 text-nss-navy focus:ring-nss-navy">
                                            </div>
                                            <div class="ml-3 text-sm leading-6">
                                                <label for="dynamic_students" class="font-medium text-gray-900">Automatically fetch and display top-ranking student pictures</label>
                                                <p class="text-gray-500">The center-to-right area will securely render rank holder avatars strictly isolated from text boundaries.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="md:col-span-3 mt-4" x-show="formData.template_type === 'admissions'">
                                    <div class="rounded-lg bg-gray-50 border border-gray-200 p-5">
                                        <h6 class="font-semibold text-gray-900 mb-3">Programs Tags</h6>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Comma separated list of tags (e.g. BBA, BCA, B.Com):</label>
                                        <input type="text" class="block w-full rounded-md border-gray-300 border p-2 focus:border-nss-gold focus:ring-nss-gold sm:text-sm" name="tags" x-model="formData.tags">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end gap-3 rounded-b-xl">
                            <button type="button" @click="showModal = false" class="inline-flex justify-center rounded-md bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mt-0">
                                Cancel
                            </button>
                            <button type="submit" class="inline-flex justify-center rounded-md bg-nss-navy px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-nss-navy-deep focus:outline-none focus:ring-2 focus:ring-nss-navy focus:ring-offset-2">
                                Save Slide Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('carouselManager', () => ({
        showModal: false,
        formData: {
            id: '',
            template_type: 'hero',
            slide_eyebrow: '',
            slide_title: '',
            slide_description: '',
            primary_cta_text: '',
            primary_cta_link: '',
            secondary_cta_text: '',
            secondary_cta_link: '',
            stats_json: '',
            affiliation_top: '',
            affiliation_bottom: '',
            tags: '',
            dynamic_students: false
        },
        
        resetForm() {
            this.formData = {
                id: '',
                template_type: 'hero',
                slide_eyebrow: '',
                slide_title: '',
                slide_description: '',
                primary_cta_text: '',
                primary_cta_link: '',
                secondary_cta_text: '',
                secondary_cta_link: '',
                stats_json: '',
                affiliation_top: '',
                affiliation_bottom: '',
                tags: '',
                dynamic_students: false
            };
        },
        
        openModalForNew() {
            this.resetForm();
            this.showModal = true;
        },
        
        openModalForEdit(slide) {
            this.formData.id = slide.id;
            this.formData.template_type = slide.template_type;
            this.formData.slide_eyebrow = slide.slide_eyebrow;
            this.formData.slide_title = slide.slide_title;
            this.formData.slide_description = slide.slide_description;
            this.formData.primary_cta_text = slide.primary_cta_text;
            this.formData.primary_cta_link = slide.primary_cta_link;
            this.formData.secondary_cta_text = slide.secondary_cta_text;
            this.formData.secondary_cta_link = slide.secondary_cta_link;
            
            // Handle extra JSON data
            if (slide.extra_data) {
                let extra = slide.extra_data;
                if (typeof extra === 'string') {
                    try { extra = JSON.parse(extra); } catch(e) { }
                }
                if (extra) {
                    if (extra.stats) this.formData.stats_json = JSON.stringify(extra.stats, null, 2);
                    if (extra.affiliation_top) this.formData.affiliation_top = extra.affiliation_top;
                    if (extra.affiliation_bottom) this.formData.affiliation_bottom = extra.affiliation_bottom;
                    if (extra.tags) this.formData.tags = extra.tags.join(', ');
                    if (extra.dynamic_students) this.formData.dynamic_students = true;
                }
            }
            this.showModal = true;
        }
    }));
});
</script>
<?= $this->endSection() ?>
