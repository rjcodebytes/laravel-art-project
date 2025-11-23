@extends('layouts.app')
@section('title', 'Privacy Policy Yashwant Garud Ajanta Art Website')
@section('meta_description', 'Learn how your data is collected, used, and protected when you visit or purchase original Ajanta paintings from the official website of Yashwant Garud.')
@section('meta_keywords', 'privacy policy, data protection, user privacy, website terms, personal information, data security')

@section('content')
<section class="py-16 px-6 md:px-20 bg-[#faf7f3] text-[#3b2e27] leading-relaxed mt-22">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl sm:text-5xl font-serif font-bold text-[#5c4033] mb-4 text-center">Privacy Policy</h1>
        <p class="text-center text-[#a57c48] text-sm font-medium mb-12">Effective Date: {{ date('F d, Y') }}</p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">Introduction</h2>
        <p class="mb-6">
            Your privacy matters. This Privacy Policy explains what personal information we collect, why we collect it,
            how we use and protect it, and your rights under applicable law. We process personal data in accordance with
            applicable Indian laws (including the DPDP framework as it is implemented) and applicable international norms
            when relevant to visitors.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">1. What Information We Collect</h2>
        <ul class="list-disc ml-6 mb-6 space-y-2">
            <li><strong>Personal Data you provide:</strong> name, email address, phone number (optional), message content, and any attachments you send via our contact form or email.</li>
            <li><strong>Technical / Non-personal data:</strong> IP address, device/browser type, pages visited, referral URL, timestamps — collected automatically via server logs and analytics tools.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">2. Purpose and Legal Basis for Processing</h2>
        <p class="mb-6">
            We process personal data for the following purposes:
        </p>
        <ul class="list-disc ml-6 mb-6 space-y-2">
            <li>To respond to inquiries and requests you send through contact forms or email;</li>
            <li>To operate and improve the site (analytics, debugging, UX improvements);</li>
            <li>To send occasional updates or exhibition invitations — only when you opt in;</li>
            <li>To comply with legal obligations (e.g., respond to lawful requests, enforce our Terms).</li>
        </ul>
        <p class="mb-6">
            Where required by applicable law or best practice (including the DPDP framework), we rely on consent,
            legitimate interest, contractual necessity, or legal compliance as our legal basis for processing.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">3. Cookies and Similar Technologies</h2>
        <p class="mb-6">
            We use cookies and similar technologies for site functionality and analytics.
            You can manage or withdraw consent via the cookie banner or your browser settings.
            (We recommend implementing an explicit cookie consent mechanism).
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">4. Data Sharing and Disclosures</h2>
        <p class="mb-6">
            We do not sell personal information. We may share data with:
        </p>
        <ul class="list-disc ml-6 mb-6 space-y-2">
            <li>Service providers (hosting, email delivery, analytics) under contract to provide services;</li>
            <li>Legal authorities when required by law or to protect rights;</li>
            <li>Third parties with your explicit consent.</li>
        </ul>
        <p class="mb-6">
            Where data is shared with processors, we require them to provide adequate security and confidentiality.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">5. Data Retention</h2>
        <p class="mb-6">
            We retain contact form data and email correspondence for <em>3 years</em> unless you request deletion earlier.
            We retain analytics and log data for <em>24 months</em> for performance and security purposes, unless otherwise
            required by law.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">6. Security</h2>
        <p class="mb-6">
            We implement reasonable technical and organisational measures to protect data (HTTPS, access controls, backups).
            However, no transmission over the internet is completely secure; we cannot guarantee absolute security.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">7. Transfers Outside India</h2>
        <p class="mb-6">
            If data is processed or stored outside India (e.g., hosting or analytics servers abroad), we ensure appropriate
            safeguards (such as standard contractual clauses or equivalent safeguards) consistent with applicable law.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">8. Links to Other Sites</h2>
        <p class="mb-6">
            Our Site may link to third-party sites. This Policy does not apply to third-party websites; check their privacy policies.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">9. Children</h2>
        <p class="mb-6">
            This Site is not directed at children under 16. We do not knowingly collect personal data from children.
            If you believe we have collected data from a child, contact us to request deletion.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">10. Updates to the Policy</h2>
        <p class="mb-6">
            We may update this Policy. We’ll post the revised date at the top of this page.
            Significant changes may be notified by posting a prominent notice on the Site.
        </p>

        <h2 class="text-2xl font-semibold text-[#3b2d26] mb-3">11. Contact / Data Requests</h2>
        <p>
            <strong>Controller / Contact:</strong> Yashwant Garud<br>
            <strong>Email:</strong> <a href="mailto:yashwantgarud77@gmail.com" class="text-[#a57c48] hover:underline">
                yashwantgarud77@gmail.com
            </a>
        </p>
    </div>
</section>
@endsection
