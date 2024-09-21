<?php

namespace App\Http\Controllers;

use App\Models\DonationModel;
use App\Models\ReportModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class DonationController extends Controller
{
    function index()
    {
        $donations = DonationModel::orderBy('id', 'desc')->get();
        return view('donasi.index', compact('donations'));
    }

    function addPost(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('media');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/asset'), $imageName);
                $path = 'asset/' . $imageName;
            } else {
                $path = null;
            }

            $job = DonationModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'amount' => $request->amount,
                'type_of_goods' => $request->type_of_goods,
                'type' => $request->type,
                'media' => $path,
            ]);
            DB::commit();
            return redirect()->route('landing_donasi')->with('message', 'Donasi berhasil di tambahkan!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('landing_donasi')->with('error_message', $exception->getMessage());
        }
    }

    function reportaddPost(Request $request)
    {
        DB::beginTransaction();
        try {
            $job = ReportModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ]);
            DB::commit();
            $this->sendMail($request->name, $request->email, $request->subject, $request->message);
            return redirect()->route('contact')->with('message', 'Pengaduan berhasil di kirim!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('contact')->with('error_message', $exception->getMessage());
        }
    }

    function sendMail($name, $to, $subject, $message)
    {
        // Create an instance of PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output (0 for no output)
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host       = 'mail.lenterakasihagape.org';  // Specify your mail server (typically mail.yourdomain.com)
            $mail->SMTPAuth   = true;                   // Enable SMTP authentication
            $mail->Username   = 'admin@lenterakasihagape.org';   // SMTP username (your full email address)
            $mail->Password   = 'YLKA20*24';         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                    // TCP port to connect to (587 is common for TLS)

            // Recipients
            $mail->setFrom('admin@lenterakasihagape.org', 'Admin YLKA');
            $mail->addAddress('alfonritonga@gmail.com', 'Laporan Atas Nama - '.$name); // Add a recipient
            $mail->addReplyTo('laporkan@ylkaindonesia.com', 'Admin YLKA');

            $messageFromUser = '<p>Nama : '.$name.'<br />Email : '.$to.'<br />Subjek : '.$subject.'<br />Pesan : '.$message.'</p>';
            // Content
            $mail->isHTML(true);                        // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $messageFromUser;

            // Send the email
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}