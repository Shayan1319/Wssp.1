import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'package:fl_chart/fl_chart.dart';
import 'package:app/main.dart';
import '../links/config.dart';

class HomeScreen extends StatefulWidget {
  final String designation;
  final int employeeNumber;
  final String fullName;

  const HomeScreen({
    super.key,
    required this.designation,
    required this.employeeNumber,
    required this.fullName,
  });

  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  late Map<String, dynamic> _employeeData = {};
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    _fetchEmployeeData();
  }

  Future<void> _fetchEmployeeData() async {
    final response = await http.post(
      Uri.parse('${Config.baseUrl}employee_home_api.php'),
      headers: {"Content-Type": "application/json"},
      body: json.encode({"employeeNO": widget.employeeNumber.toString()}),
    );

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      if (data['status']) {
        setState(() {
          _employeeData = data;
          _isLoading = false;
        });
      } else {
        // Handle error
        setState(() {
          _isLoading = false;
        });
        _showErrorDialog(data['message']);
      }
    } else {
      // Handle error
      setState(() {
        _isLoading = false;
      });
      _showErrorDialog("Failed to fetch data.");
    }
  }

  void _showErrorDialog(String message) {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: const Text('Error'),
          content: Text(message),
          actions: [
            TextButton(
              onPressed: () {
                Navigator.of(context).pop();
              },
              child: const Text('OK'),
            ),
          ],
        );
      },
    );
  }

  Future<void> _logout(BuildContext context) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.clear();
    Navigator.pushAndRemoveUntil(
      context,
      MaterialPageRoute(builder: (context) => const LoginScreen()),
      (route) => false,
    );
  }

  @override
  Widget build(BuildContext context) {
    final Color primaryColor = Color(0xFF1E88E5); // WSSCS logo color
    final Color secondaryColor = Color(0xFF004D40); // Complementary color

    return Scaffold(
      appBar: AppBar(
        backgroundColor: primaryColor,
        automaticallyImplyLeading: false,
        title: const Text(
          'Dashboard',
          style: TextStyle(
            color: Colors.white,
            fontWeight: FontWeight.bold,
          ),
        ),
      ),
      drawer: _buildDrawer(context, primaryColor),
      body: _isLoading
          ? const Center(child: CircularProgressIndicator())
          : Padding(
              padding: const EdgeInsets.all(16.0),
              child: SingleChildScrollView(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    _buildInfoCard(
                      'Employee Details',
                      [
                        _buildInfoRow(
                            'Name',
                            _employeeData['employeeData']['fName'] +
                                    ' ' +
                                    _employeeData['employeeData']['lName'] ??
                                ''),
                        _buildInfoRow('Email',
                            _employeeData['employeeData']['email'] ?? ''),
                        _buildInfoRow('Phone',
                            _employeeData['employeeData']['mNumber'] ?? ''),
                        _buildInfoRow('Address',
                            _employeeData['employeeData']['pAddress'] ?? '-'),
                        _buildInfoRow('Religion',
                            _employeeData['employeeData']['religion'] ?? '-'),
                        _buildInfoRow('Blood Group',
                            _employeeData['employeeData']['BlGroup'] ?? '-'),
                      ],
                      primaryColor,
                    ),
                    const SizedBox(height: 16),
                    _buildInfoCard(
                      'Basic Information',
                      [
                        _buildInfoRow(
                            'Hire Date',
                            _employeeData['employeeData']['Joining_Date'] ??
                                '-'),
                        _buildInfoRow(
                            'Contract Expiry Date',
                            _employeeData['employeeData']
                                    ['Contract_Expiry_Date'] ??
                                '-'),
                        _buildInfoRow(
                            'Last Working Date',
                            _employeeData['employeeData']
                                    ['Last_Working_Date'] ??
                                '-'),
                        _buildInfoRow('Address',
                            _employeeData['employeeData']['pAddress'] ?? '-'),
                        _buildInfoRow('Date of Birth',
                            _employeeData['employeeData']['DofBc'] ?? '-'),
                        _buildInfoRow(
                            'Occupation Info',
                            _employeeData['employeeData']['Weekly_Working_Days']
                                .toString()),
                      ],
                      primaryColor,
                    ),
                    const SizedBox(height: 16),
                    _buildInfoCard(
                      'Upcoming Events',
                      [
                        _buildInfoRow('Event 1', 'Details about event 1'),
                        _buildInfoRow('Event 2', 'Details about event 2'),
                        _buildInfoRow('Event 3', 'Details about event 3'),
                      ],
                      primaryColor,
                    ),
                    const SizedBox(height: 16),
                    _buildBarChartCard(primaryColor),
                  ],
                ),
              ),
            ),
    );
  }

  Widget _buildDrawer(BuildContext context, Color primaryColor) {
    return Drawer(
      child: ListView(
        padding: EdgeInsets.zero,
        children: <Widget>[
          DrawerHeader(
            decoration: BoxDecoration(
              color: primaryColor,
            ),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                CircleAvatar(
                  radius: 30,
                  backgroundColor: Colors.white,
                  backgroundImage: NetworkImage(
                      _employeeData['employeeData']['image'] ?? ''),
                ),
                const SizedBox(height: 10),
                Text(
                  _employeeData['employeeData']['fName'] +
                          ' ' +
                          _employeeData['employeeData']['lName'] ??
                      '',
                  style: const TextStyle(
                    fontSize: 20,
                    color: Colors.white,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                Text(
                  _employeeData['employeeData']['Job_Tiltle'] ?? '',
                  style: const TextStyle(
                    fontSize: 16,
                    color: Colors.white70,
                  ),
                ),
              ],
            ),
          ),
          _buildDrawerItem(Icons.dashboard, 'Dashboard', () {}),
          _buildDrawerItem(Icons.travel_explore, 'Travel Request', () {}),
          _buildDrawerItem(Icons.request_page, 'Leave Request', () {}),
          _buildDrawerItem(Icons.payments, 'Pay Slip', () {}),
          _buildDrawerItem(Icons.add_box, 'Add Appraisal', () {}),
          _buildDrawerItem(Icons.exit_to_app, 'Exit Clearance Form', () {}),
          _buildDrawerItem(Icons.person, 'Profile', () {}),
          const Divider(),
          _buildDrawerItem(Icons.exit_to_app, 'Logout', () {
            Navigator.pop(context); // Close the drawer
            _logout(context);
          }),
        ],
      ),
    );
  }

  Widget _buildDrawerItem(IconData icon, String title, VoidCallback onTap) {
    return ListTile(
      leading: Icon(icon, color: Colors.black54),
      title: Text(title),
      onTap: onTap,
    );
  }

  Widget _buildInfoCard(String title, List<Widget> content, Color color) {
    return Card(
      elevation: 4,
      child: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              title,
              style: TextStyle(
                fontSize: 18,
                fontWeight: FontWeight.bold,
                color: color,
              ),
            ),
            const SizedBox(height: 8),
            ...content,
          ],
        ),
      ),
    );
  }

  Widget _buildInfoRow(String label, String value) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 4.0),
      child: Row(
        children: [
          Text(
            '$label:',
            style: const TextStyle(fontWeight: FontWeight.bold),
          ),
          const SizedBox(width: 8),
          Expanded(child: Text(value)),
        ],
      ),
    );
  }

  Widget _buildBarChartCard(Color color) {
    // Extract data from the API response
    final totalAttendees = int.parse(_employeeData['total_attendees'] ?? '0');
    final travelReq = int.parse(_employeeData['TravelReq'] ?? '0');
    final totalAcceptLeaves =
        int.parse(_employeeData['totalAcceptLeaves'] ?? '0');
    final employeeCountOvertime =
        int.parse(_employeeData['employeeCountOVERTIME'] ?? '0');
    final employeeCountDDorOT =
        int.parse(_employeeData['employeeCountDDorOT'] ?? '0');
    final x = ['Attendees', 'Travel Req', 'Leaves', 'Overtime', 'DD/OT'];
    return Card(
      // add some padding to the card vertically

      child: Padding(
        // @ add some padding to the card only top
        padding: const EdgeInsets.only(bottom: 90.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              'Performance Summary',
              style: TextStyle(
                fontSize: 18,
                fontWeight: FontWeight.bold,
                color: color,
              ),
            ),
            const SizedBox(height: 16),
            AspectRatio(
              aspectRatio: 1.7,
              child: BarChart(
                BarChartData(
                  gridData: const FlGridData(show: false),
                  titlesData: FlTitlesData(
                    leftTitles: const AxisTitles(
                      sideTitles:
                          SideTitles(showTitles: true, reservedSize: 28),
                    ),
                    rightTitles: const AxisTitles(
                      sideTitles: SideTitles(showTitles: false),
                    ),
                    topTitles: const AxisTitles(
                      sideTitles: SideTitles(showTitles: false),
                    ),
                    bottomTitles: AxisTitles(
                      sideTitles: SideTitles(
                        showTitles: true,
                        getTitlesWidget: (value, meta) => Transform.rotate(
                          angle: -3.14 / 2,
                          child: Container(
                            margin: const EdgeInsets.only(right: 90),
                            child: Text(
                              x[value.toInt()],
                              style: const TextStyle(
                                color: Colors.black,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                  borderData: FlBorderData(
                    show: false,
                  ),
                  barGroups: [
                    BarChartGroupData(x: 0, barRods: [
                      BarChartRodData(
                          toY: totalAttendees.toDouble(), color: color),
                    ]),
                    BarChartGroupData(x: 1, barRods: [
                      BarChartRodData(toY: travelReq.toDouble(), color: color),
                    ]),
                    BarChartGroupData(x: 2, barRods: [
                      BarChartRodData(
                          toY: totalAcceptLeaves.toDouble(), color: color),
                    ]),
                    BarChartGroupData(x: 3, barRods: [
                      BarChartRodData(
                          toY: employeeCountOvertime.toDouble(), color: color),
                    ]),
                    BarChartGroupData(x: 4, barRods: [
                      BarChartRodData(
                          toY: employeeCountDDorOT.toDouble(), color: color),
                    ]),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
