<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::insert([
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h2>About Us</h2><p>Learn more about our company, products, and commitment to providing quality products and excellent customer service.</p>',
                'meta_title' => 'About Us',
                'meta_description' => 'Learn more about our company, products, and commitment to quality and customer satisfaction.',
                'meta_keywords' => 'about us, company, online store, our story',
            ],

            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'content' => '<h2>Contact Us</h2><p>Have a question or need assistance? Our customer support team is here to help.</p>',
                'meta_title' => 'Contact Us',
                'meta_description' => 'Get in touch with our customer support team for questions, assistance, or general inquiries.',
                'meta_keywords' => 'contact us, customer support, support',
            ],

            [
                'title' => 'Frequently Asked Questions',
                'slug' => 'faq',
                'content' => '<h2>Frequently Asked Questions</h2><p>Find answers to the most common questions about our products, orders, shipping, returns, and payments.</p>',
                'meta_title' => 'FAQ - Frequently Asked Questions',
                'meta_description' => 'Find answers to frequently asked questions about products, orders, shipping, returns, and payments.',
                'meta_keywords' => 'faq, frequently asked questions, help, customer support',
            ],

            [
                'title' => 'Track Order',
                'slug' => 'track-order',
                'content' => '<h2>Track Your Order</h2><p>Use your order information to check the current status and progress of your order.</p>',
                'meta_title' => 'Track Your Order',
                'meta_description' => 'Track your order status and check the latest updates on your delivery.',
                'meta_keywords' => 'track order, order tracking, delivery tracking',
            ],

            [
                'title' => 'Shipping Policy',
                'slug' => 'shipping-policy',
                'content' => '<h2>Shipping Policy</h2><p>We aim to process and deliver orders as quickly and efficiently as possible. Shipping times and charges may vary depending on your location and selected delivery method.</p>',
                'meta_title' => 'Shipping Policy',
                'meta_description' => 'Learn about our shipping methods, delivery times, shipping charges, and order processing.',
                'meta_keywords' => 'shipping policy, delivery, shipping information, order delivery',
            ],

            [
                'title' => 'Return & Refund Policy',
                'slug' => 'return-policy',
                'content' => '<h2>Return & Refund Policy</h2><p>We want you to be satisfied with your purchase. Please review our return and refund terms for information about eligible returns, exchanges, and refunds.</p>',
                'meta_title' => 'Return & Refund Policy',
                'meta_description' => 'Learn about our return, exchange, and refund policy and the requirements for eligible orders.',
                'meta_keywords' => 'return policy, refund policy, exchange, returns',
            ],

            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<h2>Privacy Policy</h2><p>Your privacy is important to us. This policy explains how we collect, use, store, and protect your personal information when you use our website.</p>',
                'meta_title' => 'Privacy Policy',
                'meta_description' => 'Read our privacy policy to understand how we collect, use, and protect your personal information.',
                'meta_keywords' => 'privacy policy, data protection, personal information, privacy',
            ],

            [
                'title' => 'Terms & Conditions',
                'slug' => 'terms',
                'content' => '<h2>Terms & Conditions</h2><p>By using our website and services, you agree to comply with our terms and conditions. Please read these terms carefully before using our services.</p>',
                'meta_title' => 'Terms & Conditions',
                'meta_description' => 'Read the terms and conditions governing the use of our website, products, and services.',
                'meta_keywords' => 'terms and conditions, terms of service, website terms',
            ],

            [
                'title' => 'Support',
                'slug' => 'support',
                'content' => '<h2>Customer Support</h2><p>Need help? Visit our support center for assistance with orders, products, shipping, returns, and other inquiries.</p>',
                'meta_title' => 'Customer Support',
                'meta_description' => 'Get help with your orders, products, shipping, returns, and other customer service inquiries.',
                'meta_keywords' => 'support, customer service, help, customer support',
            ],
        ]);
    }
}
