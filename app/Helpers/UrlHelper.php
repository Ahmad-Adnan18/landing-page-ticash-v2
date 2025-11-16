<?php

namespace App\Helpers;

use App\Models\Setting;

class UrlHelper
{
    public function generateWhatsAppUrl($whatsappNumber = null, $message = null)
    {
        // Jika tidak disediakan, ambil dari settings
        if (!$whatsappNumber) {
            $whatsappNumber = Setting::getValue('whatsapp_number', '');
        }

        // Jika tetap kosong, gunakan nomor dummy
        if (empty($whatsappNumber)) {
            $whatsappNumber = '+6281234567890'; // nomor dummy
        }

        // Format nomor (hapus karakter selain angka dan +)
        $whatsappNumber = preg_replace('/[^0-9+]/', '', $whatsappNumber);

        // Jika nomor tidak diawali +, tambahkan +62
        if (!str_starts_with($whatsappNumber, '+')) {
            if (str_starts_with($whatsappNumber, '0')) {
                $whatsappNumber = '+62' . substr($whatsappNumber, 1);
            } else {
                $whatsappNumber = '+62' . $whatsappNumber;
            }
        }

        // Jika tidak disediakan, ambil pesan default dari settings
        if (!$message) {
            $message = Setting::getValue('whatsapp_default_message', 'Halo, saya tertarik dengan sistem ticash');
        }

        // Encode pesan
        $encodedMessage = urlencode($message);

        // Generate URL
        return "https://wa.me/{$whatsappNumber}?text={$encodedMessage}";
    }

    public static function generateWhatsAppUrlStatic($whatsappNumber = null, $message = null)
    {
        $instance = app(self::class);
        return $instance->generateWhatsAppUrl($whatsappNumber, $message);
    }
}