<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\RedirectResponse;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends Controller
{
    public function __invoke(ContactFormRequest $request): RedirectResponse
    {
        $mail = new PHPMailer(true);

        try {
            $this->configureTransport($mail);

            $mail->setFrom(
                (string) config('mail.from.address'),
                (string) config('mail.from.name')
            );
            $mail->addAddress(
                (string) config('mail.to.address', config('mail.from.address')),
                (string) config('mail.to.name', config('mail.from.name'))
            );
            $mail->addReplyTo($request->string('email')->toString(), $request->string('name')->toString());
            $mail->CharSet = 'UTF-8';
            $mail->isHTML();
            $mail->Subject = 'Nieuw portfolio contactbericht van '.$request->string('name')->toString();
            $mail->Body = $this->buildHtmlBody($request);
            $mail->AltBody = $this->buildTextBody($request);

            $mail->send();
        } catch (PHPMailerException $exception) {
            report($exception);
            header('Location: '.route('welcome').'#contact');

            return back()
                ->withInput()
                ->with('error', 'Er is een fout opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.');

        }
        header('Location: '.route('welcome').'#contact');

        return back()->with('success', 'Je bericht is verzonden. Ik neem snel contact met je op.');
    }

    private function configureTransport(PHPMailer $mail): void
    {
        $mail->isSMTP();
        $mail->Host = (string) config('mail.mailers.smtp.host');
        $mail->SMTPAuth = true;
        $mail->Username = (string) config('mail.mailers.smtp.username');
        $mail->Password = (string) config('mail.mailers.smtp.password');
        $mail->Port = (int) config('mail.mailers.smtp.port');

        $encryption = (string) (config('mail.mailers.smtp.encryption') ?: config('mail.mailers.smtp.scheme'));

        if (in_array($encryption, ['tls', 'starttls'], true)) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        if (in_array($encryption, ['ssl', 'smtps'], true)) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
    }

    private function buildHtmlBody(ContactFormRequest $request): string
    {
        $name = e($request->string('name')->toString());
        $email = e($request->string('email')->toString());
        $message = nl2br(e($request->string('message')->toString()));
        $sentAt = now()->timezone(config('app.timezone'))->format('d-m-Y H:i');

        return <<<HTML
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw portfolio contactbericht</title>
</head>
<body style="margin:0;padding:0;background:#09090b;color:#e5e7eb;font-family:Arial,Helvetica,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="width:100%;background:linear-gradient(145deg,#09090b,#1a030a);padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="width:100%;max-width:640px;background:#111115;border:1px solid rgba(255,255,255,0.10);border-radius:18px;overflow:hidden;box-shadow:0 24px 70px rgba(0,0,0,0.35);">
                    <tr>
                        <td style="padding:28px 28px 22px;border-bottom:1px solid rgba(255,255,255,0.08);background:linear-gradient(135deg,rgba(196,29,85,0.24),rgba(255,255,255,0.03));">
                            <p style="margin:0 0 8px;color:#f8dbe5;font-size:13px;letter-spacing:0.08em;text-transform:uppercase;">Portfolio contact</p>
                            <h1 style="margin:0;color:#ffffff;font-size:28px;line-height:1.25;font-weight:700;">Nieuw bericht van {$name}</h1>
                            <p style="margin:12px 0 0;color:#cbd5e1;font-size:15px;line-height:1.6;">Er is een nieuw bericht verstuurd via najik.dev.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:26px 28px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="width:100%;margin-bottom:22px;">
                                <tr>
                                    <td style="padding:14px 16px;background:#17171c;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                                        <p style="margin:0 0 4px;color:#94a3b8;font-size:13px;">Naam</p>
                                        <p style="margin:0;color:#ffffff;font-size:16px;font-weight:700;">{$name}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:12px;"></td>
                                </tr>
                                <tr>
                                    <td style="padding:14px 16px;background:#17171c;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                                        <p style="margin:0 0 4px;color:#94a3b8;font-size:13px;">E-mail</p>
                                        <p style="margin:0;color:#ffffff;font-size:16px;font-weight:700;"><a href="mailto:{$email}" style="color:#fb7185;text-decoration:none;">{$email}</a></p>
                                    </td>
                                </tr>
                            </table>

                            <div style="padding:18px 18px 20px;background:#17171c;border:1px solid rgba(255,255,255,0.08);border-left:4px solid #c41d55;border-radius:14px;">
                                <p style="margin:0 0 10px;color:#94a3b8;font-size:13px;">Bericht</p>
                                <div style="color:#f8fafc;font-size:16px;line-height:1.75;">{$message}</div>
                            </div>

                            <p style="margin:22px 0 0;color:#64748b;font-size:13px;line-height:1.6;">Verzonden op {$sentAt}. Je kunt direct antwoorden op deze mail; het reply-to adres staat op {$email}.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;
    }

    private function buildTextBody(ContactFormRequest $request): string
    {
        return implode(PHP_EOL.PHP_EOL, [
            'Nieuw portfolio contactbericht',
            'Naam: '.$request->string('name')->toString(),
            'E-mail: '.$request->string('email')->toString(),
            'Bericht:',
            $request->string('message')->toString(),
            'Verzonden op: '.now()->timezone(config('app.timezone'))->format('d-m-Y H:i'),
        ]);
    }
}
