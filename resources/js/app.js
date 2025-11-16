import './bootstrap';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';

Alpine.plugin(intersect);
Alpine.plugin(collapse);

// Contact form validation as defined in tech spec
Alpine.data('contactForm', () => ({
    formData: { 
        name: '', 
        pesantren_name: '', 
        position: '', 
        whatsapp_number: '', 
        email: '' 
    },
    errors: {},
    validate(field) {
        // Reset error
        delete this.errors[field];
        // Validasi
        if (!this.formData[field]) {
            this.errors[field] = 'Kolom ini wajib diisi.';
        }
        if (field === 'whatsapp_number' && this.formData[field] && this.formData[field].length < 10) {
            this.errors[field] = 'No. WhatsApp min 10 digit.';
        }
    }
}));

window.Alpine = Alpine;

Alpine.start();
